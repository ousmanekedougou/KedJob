<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class GestionRh extends Notification
{
    use Queueable;

    public $name;
    public $email;
    public $subject; 
    public $msg;
    public $cv;
    public $cni;
    public $candidat;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$email,$subject,$msg,$cv,$cni,$candidat)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->msg = $msg;
        $this->cv = $cv;
        $this->cni = $cni;
        $this->candidatName = $candidat->name;
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
        
        return (new MailMessage)->view('admin.notifications.recrutement',[
                'name' => $this->name,
                'subject'=> $this->subject,
                'msg' => $this->msg
            ])
            ->attach(public_path() . '/' . $this->cv,[
                    'as' => $this->candidatName.'-cv.pdf',
                ])
            ->attach(public_path() . '/' . $this->cni,[
                    'as' => $this->candidatName.'-cni.pdf',
                ]);
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
