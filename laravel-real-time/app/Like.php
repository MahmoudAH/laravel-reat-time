<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
      'user_id', 'post_id'
    ];
    protected $table = "likes";
    /*
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function post(){
    	return $this->belongsTo('App\Post');
    }
*/
}
