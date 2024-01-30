<?php

namespace App\Http\Controllers;
use App\ChatInsert;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;



class Chatcontroller extends Controller
{
    public function create(Request $request){
        // dd($request->data);
        ChatInsert::insert([
            
            'chat_msg'    => $request->data,
            'chat_user1'    => $request->chat_user1,
            'chat_user2'    => $request->chat_user2

        ]);

        return false;


    }


}