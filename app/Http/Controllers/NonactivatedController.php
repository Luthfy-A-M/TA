<?php

namespace App\Http\Controllers;


//pake DB




class NonactivatedController extends Controller
{
    public function index()
    {        
        return view('landing.nonactivated');
    }
}