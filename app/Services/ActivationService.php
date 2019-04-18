<?php
namespace App\Services;

use Mail;
use App\UserActivation;
use App\Mail\UserActivationEmail;
use App\User;

class ActivationService
{
    protected $resendAfter = 24; // Sẽ gửi lại mã xác thực sau 24h nếu thực hiện sendActivationMail()
    protected $userActivation;

    public function __construct(UserActivation $userActivation)
    {
        $this->userActivation = $userActivation;
    }

    public static function sendActivationMail($user)
    {
        if ($user->active || ActivationService::shouldSend($user)) return;
        $token = UserActivation::createActivation($user);
        $user->activation_link = route('user.activate', $token);
        $mailable = new UserActivationEmail($user);
        Mail::to($user->email)->send($mailable);
    }

    public static function activateUser($token)
    {
        $activation = UserActivation::getActivationByToken($token);
        if ($activation === null) return null;
        $user = User::find($activation->user_id);
        $user->active = true;
        $user->save();
        UserActivation::deleteActivation($token);

        return $user;
    }

    private static function shouldSend($user)
    {
        $activation = UserActivation::getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $activation->resendAfter < time();
    }

}