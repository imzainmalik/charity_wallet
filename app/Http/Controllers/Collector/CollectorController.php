<?php

namespace App\Http\Controllers\Collector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectorController extends Controller
{
    //

    public function idnex(){
       return view('donor.index');
    }
}
