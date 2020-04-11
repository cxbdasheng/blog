<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/10
 * Time: 0:18
 */

namespace App\Observers;
use Mail;
use App\Models\Comment;
use Notification;
use App\Notifications\Replied;
use App\Models\Articles;
class CommentObserver extends BaseObserver
{
    public function created($comment)
    {
        parent::created($comment);
        if (mail_is_configured()) {
            $articles = Articles::withTrashed()->find($comment->article_id);
            $socialiteUser = auth()->guard('socialite')->user();
            if ($socialiteUser->is_admin == 0) {
                Notification::route('mail','851145971@qq.com')
                    ->notify(new Replied($socialiteUser, $articles, $comment));
            }
            if (intval($comment->pid) !== 0) {
                $parentComment = Comment::find($comment->pid);
                if ($socialiteUser->id !== $parentComment->socialite_user_id) {
                    // Send email to socialite user
                    $parentComment->socialiteUser->notify(new Replied($socialiteUser, $articles, $comment));
                }
            }
        }

    }
}