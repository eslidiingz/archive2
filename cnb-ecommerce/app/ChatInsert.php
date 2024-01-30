<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatInsert extends Model
{
    //

    protected $table = 'chat';
	// public $timestamps = true;
   
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'chat_msg', 'chat_user1','chat_user2',
    ];
    
}