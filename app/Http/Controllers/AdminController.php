<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;





class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {        
        $jumlahuser = DB::table('users')->whereRaw('role != "Admin"')->count();
        $jumlahuseractive = DB::table('users')->whereRaw('role != "Admin" and status = "aktif"')->count();
        $jumlahusernonactive = DB::table('users')->whereRaw('role != "Admin" and status = "nonaktif"')->count();
        $jumlahuserwaiting = DB::table('users')->whereRaw('role != "Admin" and status = "menunggu"')->count();
        return view('landing.admin',['jumlahuser' => $jumlahuser , 'jumlahuseractive' => $jumlahuseractive, 'jumlahusernonactive' => $jumlahusernonactive, 'jumlahuserwaiting' => $jumlahuserwaiting]);
    }

    public function activate($id)
    {
        DB::table('users')->where('id',$id)->update(['status'=>'aktif']);
        return response()->json(['success' => true], 200);     
    }
              
    public function deactivate($id)
    {
        DB::table('users')->where('id',$id)->update(['status'=>'nonaktif']);
        return response()->json(['success' => true], 200);     
    }
    
    public function showwaitinglist()
    {        
         $users = \DB::table('users')->select('*')
                        ->orderBy('updated_at', 'DESC')
                        ->whereRaw('role = "Facilitator" and status = "menunggu"')
                        ->paginate(10);
        return view('admin.waiting', compact('users'));
    }
    
    public function showactivelist()
    {        
         $users = \DB::table('users')->select('*')
                        ->orderBy('updated_at', 'DESC')
                        ->whereRaw('role = "Facilitator" and status = "aktif"')
                        ->paginate(10);
        return view('admin.active', compact('users'));
    }

    public function shownonactivelist()
    {        
         $users = \DB::table('users')->select('*')
                        ->orderBy('updated_at', 'DESC')
                        ->whereRaw('role = "Facilitator" and status = "nonaktif"')
                        ->paginate(10);
        return view('admin.nonactive', compact('users'));
    }
    
}