<?php

namespace App\Notifications;

use App\Models\Article;
use App\Models\Comment as CommentModel;
use App\Models\SocialiteUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
class Replied extends Notification implements ShouldQueue
{
    use Queueable;


    /**
     * @var \App\Models\SocialiteUser
     */
    public $socialiteUser;

    /**
     * @var \App\Models\Article
     */
    public $articles;

    /**
     * @var \App\Models\Comment
     */
    public $comment;
    public $subject;
    public $title;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(SocialiteUser $socialiteUser, Article $articles, CommentModel $comment)
    {
        if (intval($comment->parent_id) === 0) {
            $this->subject = config('app.name') . '- 评论提示';
            $this->title = $socialiteUser->name.'：'."《{$articles->title}》";
        } else {
            $this->subject = config('app.name') . '- 回复提示';
            $this->title = $socialiteUser->name."：《{$articles->title}》回复您";
        }
        $this->socialiteUser = $socialiteUser;
        $this->articles = $articles;
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->subject($this->subject)
            ->greeting($this->title)
            ->line(new HtmlString($this->comment->content))
            ->action('点击查看详情',$this->articles->url . '#comment-' . $this->comment->id);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
