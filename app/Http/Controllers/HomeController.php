<?php

namespace App\Http\Controllers;
use auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        if(auth()->user()->status=="aktif"){
            if(auth()->user()->role=="Admin"){
                return redirect("/LandingAdmin");
            }
                else if(auth()->user()->role=="Facilitator"){
                    return redirect("/LandingFacilitator");
                }
                    else if(auth()->user()->role=="Client"){
                        return redirect("/LandingClient");
                    }
        }
        else{
            return view('landing.nonactivated');
        }
        
    }
}
