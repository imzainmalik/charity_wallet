<?php

namespace App\Http\Controllers\Collector;

use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\Campaign;
use App\Models\DonorWalletTransaction;
use Illuminate\Http\Request;

class CollectorBankDetailsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view_bank()
    {
        $bank_details = BankDetail::where('user_id',auth()->user()->id)->first();
        return view('collector.bank.index',compact('bank_details'));
    }

    public function create_bank(Request $request){
        // dd($request->all());
        $bank = new BankDetail;
        $bank->user_id = auth()->user()->id;
        $bank->bank_name = $request->bank_name;
        $bank->bank_account_title = $request->bank_account_title;
        $bank->bank_account_number = $request->bank_account_number;
        $bank->swift_code = $request->swift_code;
        $bank->routing_number = $request->routing_number;
        $bank->save();
        return redirect()->back()->with('success','Bank details has been added');
    }

    public function update_bank(Request $request, $bank_id){
        BankDetail::where('id',$bank_id)->update(array(
            'bank_name' => $request->bank_name,
            'bank_account_title' => $request->bank_account_title,
            'bank_account_number' => $request->bank_account_number,
            'swift_code' => $request->swift_code,
            'routing_number' => $request->routing_number, 
            'status' => 0
        ));
        return redirect()->back()->with('success','Bank details has been updated');
    }

    public function transaction_history(){
        $collector_campaigns = Campaign::where('collector_id', auth()->user()->id)->pluck('id')->toArray();
        $transactions = DonorWalletTransaction::whereIn('campaign_id', $collector_campaigns)->orderBy('id','DESC')->paginate(10);
        return view('collector.bank.transaction_history',compact('transactions'));
    }
}
