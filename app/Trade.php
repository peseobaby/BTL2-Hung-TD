<?php

namespace App;

use Auth;
use App\Category;
use App\Purse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Trade extends Model
{
    protected $fillable = [
        'from', 'to', 'money', 'category_id'  
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function purse()
    {
        return $this->belongsTo('App\Purse', 'from', 'id');
    }
    // public static function store($data)
    // {	
    // 	$trade->fill([
    // 		'name' => $data('name'),
    // 		'from' => Auth::id(),
    // 		'to' => 
    // 	return $trade;
    // } 
}
