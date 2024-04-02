<?php

namespace App\Http\Controllers\Collector;

use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CollectorCampaignController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create_campaign()
    {
        $check_bank = BankDetail::where('user_id', auth()->user()->id)->first();
        if ($check_bank == null) {
            return redirect()->route('collector.dashboard')->with('error', 'Enter your bank account details before creating Campaigns.');
        }
        return view('collector.campaign.create');
    }

    public function campaign_create(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('logo')) {
            $attechment = $request->file('logo');
            $campaign_logo = time() . $attechment->getClientOriginalName();
            $attechment->move(public_path('assets/images/campaign_logo'), $campaign_logo);
        }

        $campaign = new Campaign();
        $campaign->collector_id = auth()->user()->id;
        $campaign->description = $request->description;
        if ($request->has_goal != null) {
            $campaign->has_goal = 1;
            $campaign->start_date = $request->start_date;
            $campaign->end_date = $request->end_date;
            $campaign->goal_ammount = $request->goal_ammount;
        }
        $campaign->logo = 'assets/images/campaign_logo/'.$campaign_logo;
        $campaign->save();
        return redirect()->route('collector.all_campaigns')->with('success', 'Campaign is created. Admin will review and Approve it');
        // dd($request->all());
    }

    public function all_campaigns()
    {
        $all_campaigns = Campaign::where('collector_id', auth()->user()->id)->orderBy('id','DESC')->paginate(10);
        return view('collector.campaign.all_campaigns',compact('all_campaigns'));
    }

    public function changeCampaignStatus(Request $request, $id){
        Campaign::where('id', $id)->update(array(
            'status' => $request->status
        ));
        return response()->json([
            'code' => 200
        ]);
    }

    public function view_campaign($id){
        $campaign = Campaign::findorfail($id);
        return view('collector.campaign.view', compact('campaign'));
    }
}
