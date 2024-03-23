<?php

namespace App\Notifications;

use App\Enums\Privileges;
use App\Traits\Notifications\NotifyNinja;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangePrivilegeNotification extends Notification
{
    use Queueable, NotifyNinja;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    private function message(object $notifiable): string
    {
        return match ($notifiable->privilege) {
            Privileges::Instructor->value => "Congratulations, '{$notifiable->name}'! 🎉 You have successfully upgraded to a Teacher position. Welcome to the teaching community! Your dedication and expertise will undoubtedly enrich the learning experience for our users. If you have any questions or need assistance, feel free to reach out. Best of luck on your teaching journey!",
            Privileges::Student->value => "Hello '{$notifiable->name}', we want to thank you for your contributions as a Teacher! While you have downgraded to a regular user, your impact on our learning community has been valuable. If you ever decide to return to the teaching role or have any questions, feel free to reach out. We appreciate your continued involvement in our platform. Happy learning!",
        };
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return self::notifyVia($notifiable->notify_through);
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
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
            'title' => 'Your privileges has changed.',
            'message' => $this->message($notifiable),
        ];
    }
}
