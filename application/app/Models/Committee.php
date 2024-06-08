<?php

namespace App\Models;

use App\Notifications\ComitteeResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Committee extends Authenticatable
{
    use Notifiable;

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
        public function sendPasswordResetNotification($token)
        {
            $this->notify(new ComitteeResetPassword($token));
        }

}
