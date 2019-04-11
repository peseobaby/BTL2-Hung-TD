<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Purse extends Model
{
	protected $fillable = [
        'name', 'money'  
    ];
    public static function updatePurse($data, $id)
    {
        $purse = Purse::find($id);
        $purse->name = $data['name'];
        $purse->save();
        return $purse;
    }

    public static function store($data)
    {	
    	$new = '0';
    	$purse = new Purse;
    	$purse->name = $data['name'];
    	$purse->money = $new;
    	$purse->user_id = Auth::id();
        $purse->save();
    	return $purse;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
