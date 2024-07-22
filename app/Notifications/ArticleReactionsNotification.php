<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleReactionsNotification extends Notification
{
    use Queueable;

    public $user;
    public $article;
    public $reactionType;

    /**
     * Create a new notification instance.
     */
    public function __construct(Article $article, $reactionType)
    {
        $this->user = auth()->user();
        $this->article = $article;
        $this->reactionType = $reactionType;
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
            'message' => $this->getReactionMessage(),
            'url' => route('article', $this->article->slug),
            'reactionType' => $this->reactionType,
        ];
    }

    /**
     * Get the reaction message based on the type of reaction.
     *
     * @return string
     */
    private function getReactionMessage(): string
    {
        if ($this->reactionType === 'like') {
            return trans('dashboard.notification.Liked');
        } elseif ($this->reactionType === 'dislike') {
            return trans('dashboard.notification.Disliked');
        } else {
            return trans('dashboard.notification.Interact');
        }
    }
}
