<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    //  
    

    public function campaign($id)
    {
        $campign = Campaign::findorfail($id);
        $collector_info = User::find($campign->collector_id);
        return view('campaign', get_defined_vars());
    }
}
