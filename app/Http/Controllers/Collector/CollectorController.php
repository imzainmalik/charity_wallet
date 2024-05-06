<?php

namespace App\Http\Controllers\Collector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectorController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
       return view('collector.index');
    }
}
