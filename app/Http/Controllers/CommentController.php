<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use auth;



class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function getcomment($strategy_id)
    {    
        $comments = \DB::table('comments')->select('*')
        ->join('users', 'comments.comment_user_id', '=', 'users.id')
        ->where('comment_strategy_id',$strategy_id)->orderBy('comment_datetime','ASC')->get();
        return view('layouts.comments',['comments'=>$comments]);
    }

    public function postcomment(Request $request, $strategy_id)
    {
        $strategy=\DB::table('strategys')->where('strategys.strategy_id',$strategy_id)->first();
        $useridnotification;
        if(auth()->user()->role=="Facilitator"){
            $useridnotification = \DB::table('users')->where('id',$strategy->userid)->first()->id;
        }
        else{
            $useridnotification = \DB::table('users')->where('id',$strategy->facilitatorid)->first()->id;
        }
        
        if( auth()->user()->id==$strategy->userid || auth()->user()->id==$strategy->facilitatorid){
            $comment = DB::table('comments')->insert([
                'comment_comment' => $request->comment_input,                
                'comment_strategy_id' => $strategy_id,
                'comment_user_id' => auth()->user()->id
            ]);
            $notifotheruser= \DB::table('notification')->insert([            
                'notificationName'=> auth()->user()->name.' Just Commented On Your Strategy' ,
                'notification'=> false ,          
                'notification_date'=> date("Y-m-d") ,
                'notification_user_id'=> $useridnotification,
                'notification_strategy_id'=> $strategy_id,      
            ]);                
        return back();
        }
        else{
            return "You Have No Rights To Comment Here";
        }
    }
    
}