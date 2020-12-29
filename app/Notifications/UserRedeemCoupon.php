<?php

namespace App\Notifications;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Str;

class UserRedeemCoupon extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $user;
    private $coupon;
    public function __construct(User $user, Coupon $coupon)
    {
        $this->user = $user;
        $this->coupon = $coupon;
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
        $url = env('APP_URL');
        return (new MailMessage)
            ->subject("COLEPOM - Cupom {$this->coupon->code} foi Resgatado")
            ->greeting("Olá, {$this->user->name}")
            ->line('Parabens! Você Resgatou um Cupom')
            ->line('Vá até o parceio e realize o resgate')
            ->line("Parceiro: {$this->coupon->promotion->partner->name}")
            ->line("Estabelecmento: {$this->coupon->promotion->store->name}")
            ->action("CUPOM: " . Str::upper($this->coupon->code), $url)
            ->salutation('Equipe Colepom');
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
