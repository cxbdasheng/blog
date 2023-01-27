<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/8
 * Time: 0:22
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kalnoy\Nestedset\NodeTrait;
use Str;

class Comment extends BaseModel
{
    use NodeTrait;


    protected $table = 'comments';
    /**
     * 添加更新时间、删除时间、新增时间，防止迁移写入不进时间
     * @var string[]
     */
    protected $fillable = ['socialite_user_id', 'parent_id', 'article_id', 'is_audited', 'content', '_rgt', '_lft', 'created_at', 'updated_at', 'deleted_at'];

    public function socialiteUser()
    {
        return $this->belongsTo(SocialiteUser::class)->withDefault();
    }

    public function getContentAttribute(string $value): string
    {
        return $this->ubbToImage($value);
    }

    public function setContentAttribute(string $value): void
    {
        $this->attributes['content'] = static::imageToUbb($value);
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id')->withDefault();
    }

    public function parentComment(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')->withDefault();
    }

    public function ubbToImage(string $content): string
    {
        $ubb = ['weixiao,微笑', 'piezui,撇嘴', 'se,色', 'fadai,发呆', 'deyi,得意', 'liulei,流泪', 'haixiu,害羞', 'bizui,闭嘴', 'shui,睡', 'daku,大哭', 'ganga,尴尬', 'fanu,发怒', 'tiaopi,调皮', 'ciya,呲牙', 'jingya,惊讶', 'nanguo,难过', 'ku,酷', 'lenghan,冷汗', 'zhuakuang,抓狂', 'tu,吐', 'touxiao,偷笑', 'keai,可爱', 'baiyan,白眼', 'aoman,-傲慢', 'jie,饥饿', 'kun,困', 'jingkong,惊恐', 'liuhan,流汗', 'hanxiao,憨笑', 'dabing,大兵', 'fendou,奋斗', 'zhouma,咒骂', 'yiwen,疑问', 'xu,嘘', 'yun,晕', 'zhemo,折磨', 'shuai,衰', 'kulou,骷髅', 'qiaoda,敲打', 'zaijian,再见', 'cahan,擦汗', 'koubi,抠鼻', 'guzhang,鼓掌', 'qiudale,糗大了', 'huaixiao,坏笑', 'zuohengheng,左哼哼', 'youhengheng,右哼哼', 'haqian,哈欠', 'bishi,鄙视', 'weiqu,委屈', 'kuaikule,快哭了', 'yinxian,阴险', 'qinqin,亲亲', 'xia,吓', 'kelian,可怜', 'caidao,菜刀', 'xigua,西瓜', 'pijiu,啤酒', 'lanqiu,篮球', 'pingpang,乒乓', 'kafei,咖啡', 'fan,饭', 'zhutou,猪头', 'meigui,玫瑰', 'diaoxie,凋谢', 'shiai,示爱', 'aixin,爱心', 'xinsui,心碎', 'dangao,蛋糕', 'shandian,闪电', 'zhadan,炸弹', 'dao,刀', 'zuqiu,足球', 'piaochong,瓢虫', 'bianbian,便便', 'yueliang,月亮', 'taiyang,太阳', 'liwu,礼物', 'yongbao,拥抱', 'qiang,强', 'ruo,弱', 'woshou,握手', 'shengli,胜利', 'baoquan,抱拳', 'gouyin,勾引', 'quantou,拳头', 'chajin,差劲', 'aini,爱你', 'no,NO', 'ok,OK'];
        $count = count($ubb);
        $image = [];
        $search = [];
        // 循环生成img标签
        for ($i = 1; $i <= $count; $i++) {
            $ubbArray = explode(',', $ubb[$i - 1]);
            $image[] = '<img src="' . cdn_asset('img/gif/' . $ubbArray[0] . '.gif') . '" title="' . $ubbArray[1] . '" alt="' . config('app.name') . '"/>';
            $search[] = "[:{$ubbArray[1]}]";
        }
        return str_replace($search, $image, $content);
    }

    public static function imageToUbb(string $content): string
    {
        $content = html_entity_decode(htmlspecialchars_decode($content));
        // 删标签 去空格 转义
        $content = strip_tags(trim($content), '<img>');
        preg_match_all('/<img.*?title="(.*?)".*?>/i', $content, $img);
        $search = $img[0];
        $replace = array_map(function ($v) {
            return '[' . $v . ']';
        }, $img[1]);
        $content = str_replace($search, $replace, $content);

        return clean(strip_tags($content));
    }

    /**
     * @return \Kalnoy\Nestedset\Collection<\App\Models\Comment>
     */
    public function getLatestComments(int $number)
    {
        return $this->with(['article', 'socialiteUser', 'socialiteUser.socialiteClient'])
            ->when(config('config.comment_audit') == 'true', function ($query) {
                return $query->where('is_audited', 1);
            })
            ->whereHas('socialiteUser', function ($query) {
                $query->where('is_admin', 0);
            })
            ->has('article')
            ->orderBy('created_at', 'desc')
            ->limit($number)
            ->get()
            ->each(function ($comment) {
                $comment->sub_content = $comment->content;
                $matches = [];
                preg_match_all('/<img.*?\/>/', $comment->sub_content, $matches);
                $comment->sub_content = preg_replace('/<img.*?\/>/', '@', $comment->sub_content);
                if (mb_strlen($comment->sub_content) > 10) {
                    if (config('app.locale') === 'zh-CN') {
                        $comment->sub_content = Str::substr($comment->sub_content, 0, 40);
                    } else {
                        $comment->sub_content = Str::words($comment->sub_content, 10, '');
                    }
                }
                if (count($matches[0])) {
                    $comment->sub_content = preg_replace(['/@/'], $matches[0], $comment->sub_content);
                }
                if (config('app.locale') === 'zh-CN') {
                    $comment->article->sub_title = Str::substr($comment->article->title, 0, 20);
                } else {
                    $comment->article->sub_title = Str::words($comment->article->title, 5, '');
                }
                return $comment;
            });
    }
}
