<?php
declare(strict_types=1);

namespace palPalani\LoginNotifications\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class FailedLogin extends Notification
{
    /**
     * The request IP address.
     *
     * @var string
     */
    public string $ip;

    public string $userAgent;

    /**
     * The request IP address.
     *
     * @var Carbon
     */
    public $time;

    /**
     * Create a new notification instance.
     *
     * @param string $ip
     * @param string $userAgent
     * @return void
     */
    public function __construct(string $ip, string $userAgent)
    {
        $this->ip = $ip;
        $this->userAgent = $userAgent;
        $this->time = Carbon::now();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->error()
            ->bcc(config('login-notifications.bcc'))
            ->subject(config('app.name') . ': Failed Login Notification')
            ->greeting('Account Login Failed!')
            ->line('A failed login was detected for your account.')
            ->line('This request originated from ' . $this->ip . ' (' . gethostbyaddr($this->ip) . '), using the browser ' . $this->userAgent . ' at ' . $this->time);
    }
}
