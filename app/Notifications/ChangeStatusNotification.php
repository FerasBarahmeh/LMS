<?php

namespace App\Notifications;

use App\Enums\Status;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeStatusNotification extends Notification
{
    use Queueable, NotifyNinja;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get message for notification
     */
    private function message(object $notifiable): string
    {
        if ($notifiable->status === Status::InActive->value) {
            $message = "Hello '{$notifiable->name}', we regret to inform you that due to Violating platform instructions, your account has been inactive. We apologize for any inconvenience and are here to assist with any concerns.";
        } else {
            $message = "Hello '{$notifiable->name}', we're excited to inform you that your account has been active! Enjoy enhanced features and benefits. Thank you for being a valued member!";
        }
        return $message;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Your account status has been changed.')
            ->line("{$this->message($notifiable)}")
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user_id' => $notifiable->id,
            'notification_id' => $this->id,
            'title' => 'Your account status has been changed.',
            'message' => $this->message($notifiable),
        ];
    }
}
