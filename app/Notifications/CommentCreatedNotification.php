<?php

namespace App\Notifications;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentCreatedNotification extends Notification
{
    use Queueable;

    public $user;
    public $article;

    /**
     * Create a new notification instance.
     */
    public function __construct(Comment $comment)
    {
        $this->user = User::find($comment->user_id);
        $this->article = Article::find($comment->article_id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => trans('dashboard.notification.Commented'),
            'url' => route('article', $this->article->slug),
        ];
    }
}
