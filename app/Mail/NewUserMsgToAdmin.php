<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class NewUserMsgToAdmin extends Mailable {
    use Queueable, SerializesModels;
    private $new_user;
    public $mailToAdminData;

    /**
    * Create a new message instance.
    *
    * @return void
    */

    public function __construct( User $new_user, $mailToAdminData ) {
        //
        $this->new_user = $new_user;
        $this->mailToAdminData = $mailToAdminData;
    }

    /**
    * Build the message.
    *
    * @return $this
    */

    public function build() {
        return $this->subject( 'New user has registered with email ' . $this->new_user->email . '<br>'.'and the user Details are '.'<hr>'.'phone => '.$this->new_user->phone )
        ->view( 'emails.adminNotifyMail' );
    }
}
