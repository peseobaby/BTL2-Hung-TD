<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserActivation extends Model
{
    protected $table = 'user_activations';
    protected $fillable = ['user_id','activation_code'];

    protected static function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    public static function createActivation($user)
    {
        $activation = self::getActivation($user);

        if (!$activation) {
            return self::createToken($user);
        }
        return self::regenerateToken($user);

    }

    private static function regenerateToken($user)
    {
        $token = self::getToken();
        UserActivation::where('user_id', $user->id)->update([
            'activation_code' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    private static function createToken($user)
    {
        $token = self::getToken();
        UserActivation::insert([
            'user_id' => $user->id,
            'activation_code' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    public static function getActivation($user)
    {
        return UserActivation::where('user_id', $user->id)->first();
    }


    public static function getActivationByToken($token)
    {
        return UserActivation::where('activation_code', $token)->first();
    }

    public static function deleteActivation($token)
    {
        UserActivation::where('activation_code', $token)->delete();
    }
}