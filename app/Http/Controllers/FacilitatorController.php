<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use auth;
use Illuminate\Http\Request;

//pake DB




class FacilitatorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $notification = \DB::table('notification')->select('*')
        ->join('users', 'notification.notification_user_id', '=', 'users.id')
        ->where('notification_user_id',auth()->user()->id)->get();
        
        
        return view('landing.facilitator',['notification'=>$notification]);
    }    
    

    public function showstrategylist()
    {      
        $notification = \DB::table('notification')->select('*')
        ->join('users', 'notification.notification_user_id', '=', 'users.id')
        ->where('notification_user_id',auth()->user()->id)->get();

        $strategy = \DB::table('strategys')->select('*')
        ->join('users', 'strategys.userid', '=', 'users.id')
        ->where('facilitatorid',auth()->user()->id)->get();       
        return view('facilitator.strategylist',['strategy'=>$strategy,'notification'=>$notification]);  
    }

    public function viewstrategydetails($strategy_id)
    {
        $strategy=\DB::table('strategys')->join('users', 'strategys.userid', '=', 'users.id')->where('strategy_id',$strategy_id)->first();
        if(auth()->user()->id==$strategy->facilitatorid){
        $segments=\DB::table('segments')->where('strategy_id',$strategy_id)->get();
        foreach($segments as $s){
            $s->strategy_concept = \DB::table('strategy_concepts')->where('segment_id',$s->segment_id)->get();
            foreach($s->strategy_concept as $d){
                $d->data = \DB::table('data')->where('strategy_concept_id',$d->strategy_concept_id)->orderBy('data_date_sort','ASC')->get();
                $d->maxdata = \DB::table('data')->select('data')->where('strategy_concept_id',$d->strategy_concept_id)->max('data');
            }
            $s->a=explode(',',$s->strategyconcept,2);
        }
        return view('facilitator.viewstrategydetails',['strategy'=>$strategy,'segments'=>$segments]);
        }
        else{
            return "you Doesnt have The Rights to access";
        }
    }
    public function viewdashboard($strategy_id)
    {
        $strategy=\DB::table('strategys')->join('users', 'strategys.facilitatorid', '=', 'users.id')->where('strategy_id',$strategy_id)->first();
        if(auth()->user()->id==$strategy->facilitatorid){
        $segments=\DB::table('segments')->where('strategy_id',$strategy_id)->get();
        foreach($segments as $s){
            $s->strategy_concept = \DB::table('strategy_concepts')->where('segment_id',$s->segment_id)->get();
            foreach($s->strategy_concept as $d){
                $d->data = \DB::table('data')->where('strategy_concept_id',$d->strategy_concept_id)->orderBy('data_date_sort','ASC')->get();
                $d->maxdata = \DB::table('data')->select('data')->where('strategy_concept_id',$d->strategy_concept_id)->max('data');                
            }
            $s->a=explode(',',$s->strategyconcept,2);
        }       
        return view('client.dashboard',['strategy'=>$strategy,'segments'=>$segments]);
        }
        else{
            return "you Doesnt have The Rights to access";
        }
    }
}