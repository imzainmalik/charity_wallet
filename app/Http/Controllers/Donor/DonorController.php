<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    //

    public function dashboard(){
        dd(Auth::user());
    }
}
