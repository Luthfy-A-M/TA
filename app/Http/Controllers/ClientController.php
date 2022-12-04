<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use auth;
use Illuminate\Http\Request;
use DateTime;

//pake DB




class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function index()
    {        
        return view('landing.client');
    }

    public function wizard()
    {   
        $strategy = null;
        $facilitator = \DB::table('users')->select('*')        
        ->whereRaw('role = "Facilitator" and status = "aktif"') -> get();
        return view('client.wizard',['facilitator' => $facilitator,'strategy'=>$strategy]);        
    }
    //create strategy
    public function createstrategy(Request $request)
    {
        $facilitatormail= explode("-",$request->facilitator,2)[1];
        $facilitatorid = \DB::table('users')->where('email',$facilitatormail)->first()->id;
        $strategy = \DB::table('strategys')->insert([            
            'objective'=>$request->objective,
            'userid'=>auth()->user()->id,          
            'facilitatorid'=> $facilitatorid ,
            'strategy_name'=>$request->strategyname             
        ]);        
        $stratid = \DB::table('strategys')->where('userid',auth()->user()->id)->orderBy('strategy_id', 'DESC')->first()->strategy_id;        
        $notifFaci= \DB::table('notification')->insert([            
            'notificationName'=> auth()->user()->name.' Just Created New Strategy' ,
            'notification'=>false,          
            'notification_date'=> date("Y-m-d") ,
            'notification_user_id'=> $facilitatorid,
            'notification_strategy_id'=> $stratid,      
        ]);
        return redirect("/wizard/$stratid/segmenting/");
    }
    public function updatestrategy(Request $request,$strategy_id)
    {
        $strategychecker = \DB::table('strategys')->where('strategy_id',$strategy_id)->first();
        if(auth()->user()->id==$strategychecker->userid){
        $facilitatormail= explode("-",$request->facilitator,2)[1];
        $facilitatorid = \DB::table('users')->where('email',$facilitatormail)->first()->id;
        $strategy =\DB::table('strategys')->where('strategy_id',$strategy_id)->update([            
            'objective'=>$request->objective,
            'userid'=>auth()->user()->id,          
            'facilitatorid'=> $facilitatorid ,
            'strategy_name'=>$request->strategyname             
        ]);        
        return redirect("/wizard/$strategy_id/segmenting/");
        }
        else{
            return "you Doesnt have The Rights to access";
        }
    }

    public function deletestrategy($strategy_id){
        $strategy = \DB::table('strategys')->where('strategy_id',$strategy_id)->first();
        if(auth()->user()->id==$strategy->userid){
            \DB::table('comments')->where('comment_strategy_id',$strategy_id)->delete();
            \DB::table('notification')->where('notification_strategy_id',$strategy_id)->delete();
            $deleted = \DB::table('strategys')->join('segments', 'strategys.strategy_id', '=', 'segments.strategy_id')->join('strategy_concepts', 'segments.segment_id', '=', 'strategy_concepts.segment_id')->where('strategys.strategy_id',$strategy_id)->get();
            foreach($deleted as $d){
                \DB::table('data')->where('strategy_concept_id',$d->strategy_concept_id)->delete();
                
                \DB::table('strategy_concepts')->where('strategy_concept_id',$d->strategy_concept_id)->delete();
            }            
            DB::table('segments')->where('strategy_id',$strategy_id)->delete();
            DB::table('strategys')->where('strategy_id',$strategy_id)->delete();
            return redirect("/strategylist");
        }
        else{
            return "you Doesnt have The Rights to access";
        }
    }
    //fixed
    
    public function define($id)
    {   
        $facilitator = \DB::table('users')->select('*')        
        ->whereRaw('role = "Facilitator" and status = "aktif"') -> get();     
        $strategy = \DB::table('strategys')->where('strategy_id',$id)->first();   
        $currentfacilitator = \DB::table('users')->find($strategy->facilitatorid);
        if(auth()->user()->id==$strategy->userid){
        return view('client.wizard',['strategy'=>$strategy,'facilitator' => $facilitator,'currentfacilitator'=>$currentfacilitator]);
        }
        else{
            return "you Doesnt have The Rights to access";
        }
    }

    public function showstrategylist()
    {
        $strategy = \DB::table('strategys')->select('*')
        ->join('users', 'strategys.facilitatorid', '=', 'users.id')
        ->where('userid',auth()->user()->id)->get();       
        return view('client.strategylist',['strategy'=>$strategy]);
    }
   
    public function segmenting($id)
    {   
             
        $strategy = \DB::table('strategys')->where('strategy_id',$id)->first();
        $segments = \DB::table('segments')->where('strategy_id',$id)->get();
        if(auth()->user()->id==$strategy->userid){
            foreach($segments as $s){
                $s->strategy_concept = \DB::table('strategy_concepts')->where('segment_id',$s->segment_id)->get();
            }
        return view('client.segmenting',['strategy'=>$strategy,'segments'=>$segments]);
        }
        else{
            return "you Doesnt have The Rights to access";
        }
    }

    public function createsegment(Request $request,$id)    
    {   
        $strategy = \DB::table('strategys')->where('strategy_id',$id)->first();
        if(auth()->user()->id==$strategy->userid){     
        $segment = \DB::table('segments')->insert([ 
            'segment_name'=>$request->segmentname,      
            'propositionvalue'=>$request->propositionvalue,
            'resistor'=>$request->resistor,
            'strategy_id'=>$id,  
        ]); 
        return redirect("wizard/$id/segmenting");
        }
    else{
        return "you Doesnt have The Rights to access";
        }
    }

    public function deletesegment($segmentid)    
    {   
        $strategy = \DB::table('strategys')
        ->join('segments', 'strategys.strategy_id', '=', 'segments.strategy_id')
        ->where('segment_id',$segmentid)->first();
        if(auth()->user()->id==$strategy->userid){            
            $deleted = \DB::table('strategy_concepts')->where('segment_id',$segmentid)->get();
            foreach($deleted as $d){
                \DB::table('data')->where('strategy_concept_id',$d->strategy_concept_id)->delete();                
                \DB::table('strategy_concepts')->where('strategy_concept_id',$d->strategy_concept_id)->delete();
            }                             
        \DB::table('segments')->where('segment_id',$strategy->segment_id)->delete();
        return back();
        }
    else{
        return "you Doesnt have The Rights to access";
        }
    }

    public function segmentconceptselection ($segmentid)    
    {   
        $a=array(null);
        $strategy = \DB::table('strategys')
        ->join('segments', 'strategys.strategy_id', '=', 'segments.strategy_id')
        ->where('segment_id',$segmentid)
        ->first();
        if($strategy->strategyconcept)
        {
        $a=explode(',',$strategy->strategyconcept,2);
        }
        if(auth()->user()->id==$strategy->userid){  
        return view('client.segmentconceptselection',['strategy'=>$strategy,'a'=>$a]);
        }
    else{
        return "you Doesnt have The Rights to access";
        }
    }

    public function segmentconceptselectionpost(Request $request,$segmentid)      
    {   //Ambil Value Segment Terpilih
        $strategyconcept='';
        $i = 0;
        if($request->strategyconcept1){
            if($i == 0){
            $strategyconcept=$strategyconcept.$request->strategyconcept1;
            $i=+1;
            }
            else{
            $strategyconcept=$strategyconcept.','.$request->strategyconcept1;
            }
        }
        if($request->strategyconcept2){
            if($i == 0){
                $strategyconcept=$strategyconcept.$request->strategyconcept2;
                $i=+1;
                }
                else{            
                $strategyconcept=$strategyconcept.','.$request->strategyconcept2;
                }
        }
        if($request->strategyconcept3){
            if($i == 0){
                $strategyconcept=$strategyconcept.$request->strategyconcept3;
                $i=+1;
                }
                else{
                $strategyconcept=$strategyconcept.','.$request->strategyconcept3;
                }
        }
        if($request->strategyconcept4){
            if($i == 0){
                $strategyconcept=$strategyconcept.$request->strategyconcept4;
                $i=+1;
                }
                else{
                $strategyconcept=$strategyconcept.','.$request->strategyconcept4;
                }
        }
        if($request->strategyconcept5){
            if($i == 0){
                $strategyconcept=$strategyconcept.$request->strategyconcept5;
                $i=+1;
                }
                else{
                $strategyconcept=$strategyconcept.','.$request->strategyconcept5;
                }
        }

        $segment = \DB::table('strategys')->join('segments', 'strategys.strategy_id', '=', 'segments.strategy_id')->where('segment_id',$segmentid)->first();
        if(auth()->user()->id==$segment->userid){     
        $segment = \DB::table('segments')->where('segment_id',$segmentid)->update([ 
            'purpose'=>$request->purpose,      
            'strategyconcept'=>$strategyconcept,
            'reason'=>$request->reason              
        ]); 
        return redirect("/wizard/conceptimplementation/$segmentid");
        }
    else{
        return "you Doesnt have The Rights to access";
        }
    }
    
    public function segmentconceptimplementation ($segmentid)    
    {   
        $a=array(null);
        $strategy = \DB::table('strategys')->join('segments', 'strategys.strategy_id', '=', 'segments.strategy_id')->where('segment_id',$segmentid)->first();
        if($strategy->strategyconcept)
        {
        $a=explode(',',$strategy->strategyconcept,2);
        }
        if(auth()->user()->id==$strategy->userid){  
            $strategy_concepts =   \DB::table('strategy_concepts')->where('segment_id',$segmentid)->get();
        return view('client.segmentconceptimplementation',['strategy'=>$strategy,'a'=>$a,'strategy_concepts'=>$strategy_concepts]);
        }
    else{
        return "you Doesnt have The Rights to access";
        }
    }

    public function segmentconceptimplementationcreate(Request $request,$segmentid)    
    {   
        $a=array(null);
        $strategy = \DB::table('strategys')->join('segments', 'strategys.strategy_id', '=', 'segments.strategy_id')->where('segment_id',$segmentid)->first();
        if(auth()->user()->id==$strategy->userid){
            $segmentconceptimplementation = \DB::table('strategy_concepts')->insert([            
                'strategy_concept_name'=>$request->conceptname,
                'segment_id'=> $segmentid ,
                'strategy_concept_description'=>$request->conceptdescription,
                'strategy_concept_indicator'=>$request->indicator,
            ]);
            

        return redirect("/wizard/conceptimplementation/$segmentid");
        }
    else{
        return "you Doesnt have The Rights to access";
        }
    }

    
    public function segmentconceptimplementationedit(Request $request,$strategyconcept_id)    
    {   
        $strategy = \DB::table('strategys')->join('segments', 'strategys.strategy_id', '=', 'segments.strategy_id')->join('strategy_concepts', 'segments.segment_id', '=', 'strategy_concepts.segment_id')->where('strategy_concept_id',$strategyconcept_id)->first();
        if(auth()->user()->id==$strategy->userid){
            $segmentconceptimplementation = \DB::table('strategy_concepts')->where('strategy_concept_id',$strategyconcept_id)->update([            
                'strategy_concept_name'=>$request->conceptname,
                'strategy_concept_description'=>$request->conceptdescription,
                'strategy_concept_indicator'=>$request->indicator,
            ]);
        return back();
        }
    else{
        return "you Doesnt have The Rights to access";
        }
    }


    public function segmentconceptimplementationdelete($strategyconcept_id)    
    {   
        $strategy = \DB::table('strategys')->join('segments', 'strategys.strategy_id', '=', 'segments.strategy_id')->join('strategy_concepts', 'segments.segment_id', '=', 'strategy_concepts.segment_id')->where('strategy_concept_id',$strategyconcept_id)->first();
        if(auth()->user()->id==$strategy->userid){
            \DB::table('data')->where('strategy_concept_id',$strategyconcept_id)->delete();            
            \DB::table('strategy_concepts')->where('strategy_concept_id',$strategyconcept_id)->delete();
        return back();
        }
    else{
        return "you Doesnt have The Rights to access";
        }
    }
    
    public function viewstrategydetails($strategy_id)
    {
        $strategy=\DB::table('strategys')->join('users', 'strategys.facilitatorid', '=', 'users.id')->where('strategy_id',$strategy_id)->first();
        if(auth()->user()->id==$strategy->userid){
        $segments=\DB::table('segments')->where('strategy_id',$strategy_id)->get();
        foreach($segments as $s){
            $s->strategy_concept = \DB::table('strategy_concepts')->where('segment_id',$s->segment_id)->get();
            foreach($s->strategy_concept as $d){
                $d->data = \DB::table('data')->where('strategy_concept_id',$d->strategy_concept_id)->orderBy('data_date_sort','ASC')->get();
                $d->maxdata = \DB::table('data')->select('data')->where('strategy_concept_id',$d->strategy_concept_id)->max('data');                
            }
            $s->a=explode(',',$s->strategyconcept,2);
        }       
        return view('client.viewstrategydetails',['strategy'=>$strategy,'segments'=>$segments]);
        }
        else{
            return "you Doesnt have The Rights to access";
        }
    }
   
    
    public function checkrequest(Request $request){ 
        return $request->data;
    }

    public function adddata(Request $request,$strategy_id){        
        $strategy = \DB::table('strategys')->join('segments', 'strategys.strategy_id', '=', 'segments.strategy_id')->join('strategy_concepts', 'segments.segment_id', '=', 'strategy_concepts.segment_id')->where('strategys.strategy_id',$strategy_id)->get();
        if(auth()->user()->id==$strategy->first()->userid){            
                 foreach($strategy as $s){
                    $cekdata = DB::table('data')->where('strategy_concept_id',$s->strategy_concept_id)->where('date',$request->date)->first();
                    if($cekdata){
                        return "Month Already Filled";
                    }
                    else if($request->data[$s->strategy_concept_id]){
                    $ymd = \DateTime::createFromFormat('d-m-Y', '10-'.$request->date)->format('Y-m-d');
                    $data = DB::table('data')->insert([
                        'data' => $request->data[$s->strategy_concept_id],
                        'date' => $request->date,
                        'strategy_concept_id' => $s->strategy_concept_id,
                        'data_date_sort' => $ymd
                    ]);                
                    }     
                 }             
                return back();
                 }
         else{
            return "you Doesnt have The Rights to access";
            }     
         
    }
    public function viewdashboard($strategy_id)
    {
        $strategy=\DB::table('strategys')->join('users', 'strategys.facilitatorid', '=', 'users.id')->where('strategy_id',$strategy_id)->first();
        if(auth()->user()->id==$strategy->userid){
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
    public function editdata(Request $request,$strategy_id,$data_id)
    {
        $strategy=\DB::table('strategys')->join('users', 'strategys.facilitatorid', '=', 'users.id')->where('strategy_id',$strategy_id)->first();
        if(auth()->user()->id==$strategy->userid){
            $segments=\DB::table('segments')->where('strategy_id',$strategy_id)->get();
            $data=\DB::table('data')->where('data_id',$data_id)->first();
            foreach($segments as $s){
                $s->strategy_concept = \DB::table('strategy_concepts')->where('segment_id',$s->segment_id)->get();
                foreach($s->strategy_concept as $d){
                    if($d->strategy_concept_id==$data->strategy_concept_id){
                        \DB::table('data')->where('data_id',$data_id)->update([            
                            'data'=>$request->data,                            
                        ]);
                    }
                }
        }
        return back();
        }
        else{
            return "you Doesnt have The Rights to access";
        }
    }

    public function deletedata($strategy_id,$data_id)
    {
        $strategy=\DB::table('strategys')->join('users', 'strategys.facilitatorid', '=', 'users.id')->where('strategy_id',$strategy_id)->first();
        if(auth()->user()->id==$strategy->userid){
            $segments=\DB::table('segments')->where('strategy_id',$strategy_id)->get();
            $data=\DB::table('data')->where('data_id',$data_id)->first();
            foreach($segments as $s){
                $s->strategy_concept = \DB::table('strategy_concepts')->where('segment_id',$s->segment_id)->get();
                foreach($s->strategy_concept as $d){
                    if($d->strategy_concept_id==$data->strategy_concept_id){
                        \DB::table('data')->where('data_id',$data_id)->delete();
                    }
                }
        }
        return back();
        }
        else{
            return "you Doesnt have The Rights to access";
        }
    }
    public function adddataconcept(Request $request,$strategy_id,$concept_id)
    {
        $strategy=\DB::table('strategys')->join('users', 'strategys.facilitatorid', '=', 'users.id')->where('strategy_id',$strategy_id)->first();
        if(auth()->user()->id==$strategy->userid){
            $segments=\DB::table('segments')->where('strategy_id',$strategy_id)->get();
            $strategy_concept=\DB::table('strategy_concepts')->where('strategy_concept_id',$concept_id)->first();
            foreach($segments as $s){
                if($s->segment_id==$strategy_concept->segment_id){
                    $ymd = \DateTime::createFromFormat('d-m-Y', '10-'.$request->date)->format('Y-m-d');
                    $data = DB::table('data')->insert([
                        'data' => $request->data,
                        'date' => $request->date,
                        'strategy_concept_id' => $concept_id,
                        'data_date_sort' => $ymd
                    ]);
                }
            }        
        return back();
        }
        else{
            return "you Doesnt have The Rights to access";
        }
    }
}