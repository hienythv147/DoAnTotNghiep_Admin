<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('password/reset/' . $this->token .'?email='. $notifiable->email);
        return (new MailMessage)
                    ->from('hienythv147@gmail.com', 'Master')
                    ->greeting('Xin chào!')
                    ->line('Chúng tôi đã được yêu cầu đặt lại tài khoản của bạn. Làm theo hướng dẫn bên dưới đây để lấy lại mật khẩu. Bỏ qua E-Mail nếu bạn không yêu cầu đặt lại mật khẩu. Đừng lo lắng, tài khoản của bạn vẫn an toàn. Nhấp vào liên kết sau để đặt mật khẩu mới.')
                    ->action('Lấy lại mật khẩu', url($url))
                    ->line('Một ngày tốt lành!');
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
