<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use auth;



class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function getnotification()
    {        
        $notification = \DB::table('notification')->select('*')
        ->join('users', 'notification.notification_user_id', '=', 'users.id')
        ->where('notification_user_id',auth()->user()->id)->orderBy('notification_date','DESC')->get();
        $notification = $notification->unique('notification_strategy_id');
        return view('layouts.notification',['notification'=>$notification]);
    }

    public function getlinknotification($notif_id)
    {        
        $notification = \DB::table('notification')->where('notification_id',$notif_id)->first();
        if(auth()->user()->id==$notification->notification_user_id){
            $updatestatus = \DB::table('notification')->where('notification_id',$notif_id)->update([            
                'notification'=>true,            
            ]);
            if(auth()->user()->role == "Facilitator"){
                return redirect('/facilitator/viewstrategydetails/'.$notification->notification_strategy_id);
            }
            if(auth()->user()->role == "Client"){
                return redirect('/strategy/'.$notification->notification_strategy_id.'/details');
            }
                
        }
        else{
            return 'You Doesnt Have The Rights To Access This';
        }
        
    }
    
}