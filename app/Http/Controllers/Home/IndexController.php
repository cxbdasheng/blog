<?php

namespace App\Http\Controllers\Home;

use Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\SocialiteUser;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Tag;
use Cache;
use App\Models\Time;
use App\Models\Praise;
use Illuminate\View\View;
use Str;

class IndexController extends Controller
{
    /**
     * 首页
     * @Author: ChenDasheng
     * @Created: 2020/3/29
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $type = "index";
        // 获取文章列表数据
        $articles = Article::select(
            'id', 'category_id', 'title',
            'slug', 'author', 'description',
            'cover', 'is_top', 'created_at'
        )->orderBy('created_at', 'desc')->with(['categories', 'tags'])->paginate(10);
        $index = $articles->min('id');
        $head = [
            'title' => config('config.head.title'),
            'keywords' => config('config.head.keywords'),
            'description' => config('config.head.description'),
        ];
        $assign = ['articles' => $articles, 'type' => $type, 'type_id' => 0, 'index' => $index, 'head' => $head];
        return view('home.index', $assign);
    }

    public function article(Article $article, Request $request, Comment $commentModel, Praise $praise): View
    {
        // 同一个用户访问同一篇文章每天只增加1个访问量  使用 ip+id 作为 key 判别
        $ipAndId = 'article_' . $request->ip() . ':' . $article->id;
        if (!Cache::has($ipAndId)) {
            Cache::set($ipAndId, '1', 1440);
            // 文章点击量+1
            $article->increment('views');
        }
        $head = [
            'title' => config('config.head.title'),
            'keywords' => config('config.head.keywords'),
            'description' => config('config.head.description'),
        ];

        $praiseCount = $praise->where('article_id', $article->id)->count();
        // 获取评论
        $comment_flat_tree = Comment::where('article_id', $article->id)
            ->with('socialiteUser', 'socialiteUser.socialiteClient', 'parentComment', 'parentComment.socialiteUser')
            ->when(config('config.comment_audit') == 'true', function ($query) {
                return $query->where('is_audited', 1);
            })
            ->withDepth()
            ->get()
            ->toFlatTree();
        $parent_comments = $comment_flat_tree->whereNull('parent_id')
            ->sortByDesc('created_at')
            ->values();
        $children_comments = $comment_flat_tree->whereNotNull('parent_id')->values();
        $comments = collect([]);
        foreach ($parent_comments as $parent_comment) {
            $comments->push($parent_comment);

            foreach ($children_comments as $children_comment) {
                if ($children_comment->isDescendantOf($parent_comment)) {
                    $comments->push($children_comment);
                }
            }
        }
        $assign = compact('article', 'comments', 'praiseCount');
        return view('home.article', $assign);
    }

    public function category(Category $category, Request $request)
    {
        $type = "category";
        $articles = $category->articles()
            ->orderBy('created_at', 'desc')
            ->with('tags')
            ->paginate(10);
        $index = $articles->min('id');
        $head = [
            'title' => $category->name,
            'keywords' => $category->keywords,
            'description' => $category->description,
        ];
        $assign = ['articles' => $articles, 'type' => $type, 'type_id' => $category->id, 'index' => $index, 'head' => $head];
        return view('home.index', $assign);
    }

    public function tag(Tag $tag, Request $request)
    {
        $type = "tag";
        // 获取标签下的文章
        $articles = $tag->articles()->orderBy('created_at', 'desc')
            ->with(['categories', 'tags'])
            ->paginate(10);
        $index = $articles->min('id');
        $head = [
            'title' => $tag->name,
            'keywords' => $tag->keywords,
            'description' => $tag->description,
        ];
        $assign = ['articles' => $articles, 'type' => $type, 'type_id' => $tag->id, 'index' => $index, 'head' => $head];
        return view('home.index', $assign);
    }

    public function more(Request $request, Article $articles, Tag $tag)
    {
        if (!isset($request->index) || !isset($request->type_id)) {
            $data = [
                'success' => 0,
                'message' => "请求失败！",
                'data' => [
                ],
            ];
            return response()->json($data);
        }
        switch ($request->type) {
            case 'category':
                $articles = $articles->select(
                    'id', 'category_id', 'title',
                    'slug', 'author', 'description',
                    'cover', 'is_top', 'created_at'
                )->with('categories')
                    ->where('category_id', $request->type_id)
                    ->orderBy('created_at', 'desc')
                    ->where('id', '<', $request->index)
                    ->limit(5)
                    ->get();
                break;
            case 'search':
                $wd = clean($request->input('type_id'));
                $id = $articles->searchArticleGetId($wd);
                $articles = $articles->select(
                    'id', 'category_id', 'title',
                    'author', 'description', 'cover',
                    'is_top', 'created_at'
                )->whereIn('id', $id)
                    ->orderBy('created_at', 'desc')
                    ->with(['categories', 'tags'])
                    ->where('id', '<', $request->index)
                    ->limit(5)->get();
                break;
            case 'tag':
                $articles = $tag->find($request->type_id)->articles()->orderBy('created_at', 'desc')
                    ->with(['categories', 'tags'])->where('id', '<', $request->index)->limit(5)->get();
                break;
            default:
                $articles = $articles->select(
                    'id', 'category_id', 'title',
                    'slug', 'author', 'description',
                    'cover', 'is_top', 'created_at'
                )->with('categories')
                    ->orderBy('created_at', 'desc')
                    ->where('id', '<', $request->index)->limit(5)
                    ->get();
                break;
        }
        $data = [
            'success' => 1,
            'message' => "请求成功！",
            'data' => [
                'index' => $articles->min('id') ? $articles->min('id') : $request->index,
                'type' => $request->type,
                'type_id' => $request->type_id,
                'item' => $articles
            ],
        ];
        return response()->json($data);
    }

    public function search(Request $request, Article $articles)
    {
        // 禁止蜘蛛抓取搜索页
        if (Agent::isRobot()) {
            abort(404);
        }
        $wd = clean($request->input('wd'));
        $id = $articles->searchArticleGetId($wd);
        $data = $articles->select(
            'id', 'category_id', 'title',
            'author', 'description', 'cover',
            'is_top', 'created_at'
        )->whereIn('id', $id)
            ->orderBy('created_at', 'desc')
            ->with(['categories', 'tags'])
            ->paginate(10);
        $index = $data->min('id');
        $head = [
            'title' => $wd,
            'keywords' => '',
            'description' => '',
        ];
        $assign = [
            'articles' => $data,
            'type' => 'search',
            'type_id' => 0,
            'index' => $index,
            'wd' => $wd,
            'head' => $head,
        ];
        return response()->view('home.index', $assign)->header('X-Robots-Tag', 'noindex');
    }

    public function time(Time $time)
    {
        $times = $time->orderBy('id', 'desc')->get();
        $head = [
            'title' => '时间轴',
            'keywords' => '时间轴,文章归档,小日记',
            'description' => '文章归档，时间轴',
        ];
        $assign = [
            'times' => $times,
            'head' => $head,
        ];
        return view('home.time', $assign);
    }

    public function contact(CommentRequest $request)
    {
        // 如果用户输入邮箱；则将邮箱记录入socialite_user表中
        $email = $request->input('email', '');
        $userId = $request->input('socialite_user_id', '');
        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            // 修改邮箱
            SocialiteUser::where('id', $userId)->update([
                'email' => $email,
            ]);
        }
        $parent_id = (int)$request->input('parent_id');
        $new_comment = $request->only('article_id', 'content', 'parent_id', 'socialite_user_id') + [
                'is_audited' => (config('config.comment_audit') == 'true' ? 0 : 1),
            ];
        if ($parent_id === 0) {
            $comment = Comment::create($new_comment);
        } else {
            $comment = Comment::where('id', $parent_id)->firstOrFail()->children()->create($new_comment);
        }
        if ($comment) {
            $data = [
                'success' => 1,
                'message' => "请求成功！",
                'data' => [
                    'id' => $comment->id
                ],
            ];
        } else {
            $data = [
                'success' => 0,
                'message' => "请求失败！",
                'data' => [
                ],
            ];
        }

        return response()->json($data);
    }

    public function praise(Request $request, Praise $praise)
    {
        $id = $request->id ?? 0;
        $count = $praise->where('article_id', '=', $id)->where('ip', '=', $request->ip())->count();
        if ($count) {
            return response()->json('check');
        } else {
            $data = [
                'article_id' => $id,
                'ip' => $request->ip()
            ];
            $praise->fill($data);
            $res = $praise->save();
            if ($res) {
                return response()->json('ok');
            }
        }
    }

    public function about()
    {
        $head = [
            'title' => '关于我',
            'keywords' => '关于我,陈大剩,Cxb,ChenDasheng',
            'description' => '我是陈大剩，一个位90后草根站长，一位户外旅行爱好者，一位持续学习者，一名PHP程序猿^_^',
        ];
        $assign = [
            'head' => $head,
        ];
        return view('home.about', $assign);
    }
}
