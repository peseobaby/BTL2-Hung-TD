<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserActivation;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function updateInfor($data, $id)
    {
        $user = new User;
        $userid = $user->find($id);
        $userid->name = $data['name'];
        $userid->address = $data['address'];
        unset($data['_token']);
        unset($data['_method']);
        $userid->save();
        return $userid;
    }

    public function userActivation()
    {
       return $this->hasMany(UserActivation::class);
    }
}
