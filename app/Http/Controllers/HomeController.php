<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkUserAccType()
    {
        // dd(Auth::user());
        if(Auth::user()->account_type == 2){
           
            return redirect()->route('admin.dashboard');
        } 

        if(Auth::user()->account_type == 1){

            if(Auth::user()->acc_status == 0){
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is not approved by the Admin yet.');
            }

            if(Auth::user()->acc_status == 1){
                return redirect()->route('collector.dashboard');
            }
            if(Auth::user()->acc_status == 2){
                // dd(Auth::user());
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is Suspended by the Admin.');
            }
        } 

        if(Auth::user()->account_type == 0){
            if(Auth::user()->acc_status == 0){
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is not approved by the Admin yet.');
            }

            if(Auth::user()->acc_status == 1){
                return redirect()->route('donor.dashboard');
            }
            if(Auth::user()->acc_status == 2){
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is Suspended by the Admin.');
            }
        } 
    }
}
