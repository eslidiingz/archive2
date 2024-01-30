<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
    }

    public static function getNoti($paginate = null)
    {
        if ($paginate) {
            $data['data'] = Notification::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate($paginate);
        } else {
            $data['data'] = Notification::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }
        foreach ($data['data'] as $key => $value) {
            $value->detail;
        }
        $data['count'] = Notification::where('read', 'unread')
            ->where('user_id', auth()->user()->id)
            ->count();
        // dd($data);
        return $data;
    }

    public function addNoti($user, $type, $description)
    {

        try {
            $insert = Notification::insertGetId([
                'user_id' => $user,
                'detail_id' => $type,
                'text' => $description,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            if ($insert) {
                return response()->json($insert);
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
            // echo 'error insert';
        }
    }
    public function mockNoti(Request $request)
    {
        $insert = NotificationController::addNoti($request->user_id, $request->detail_id, $request->des);
        dd($insert);
    }


    //2 function
    // make read (maybe override)
    // make read all
}
