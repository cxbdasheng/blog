<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/10
 * Time: 0:18
 */

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use Notification;
use App\Notifications\Replied;
use App\Models\Article;

class CommentObserver extends BaseObserver
{
    public function created(Model $comment)
    {
        parent::created($comment);
        if (mail_is_configured() && !app()->runningInConsole()) {
            $articles = Article::withTrashed()->find($comment->article_id);
            $socialiteUser = auth()->guard('socialite')->user();
            if ($socialiteUser->is_admin == 0) {
                Notification::route('mail', config('mail.from.address'))
                    ->notify(new Replied($socialiteUser, $articles, $comment));
            }
            if (intval($comment->parent_id) !== 0) {
                $parentComment = Comment::find($comment->parent_id);
                if ($socialiteUser->id !== $parentComment->socialite_user_id) {
                    // Send email to socialite user
                    $parentComment->socialiteUser->notify(new Replied($socialiteUser, $articles, $comment));
                }
            }
        }

    }
}
