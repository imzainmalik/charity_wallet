<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonorWallet;
use App\Models\DonorWalletTransaction;
use App\Models\WalletTopUp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        $all_donation = DonorWalletTransaction::where('donor_id', auth()->user()->id)->orderBy('id', 'DESC')->limit(10);
        $transaction_history = DonorWalletTransaction::where('donor_id', auth()->user()->id);

        $lastWeekStartDate = Carbon::now()->subWeek();
        $lastWeekEndDate = Carbon::now();
        // dd($lastWeekStartDate, $lastWeekEndDate);
        $currentWeekStartDate = Carbon::now()->startOfWeek();
        $currentWeekEndDate = Carbon::now();
        // dd($currentWeekStartDate, $currentWeekEndDate);
        // $thisWeekStartDate = Carbon::now()->startOfWeek();
        // $thisWeekEndDate = Carbon::now()->endOfWeek();
        // dd($lastWeekStartDate, $lastWeekEndDate);
        
        $lastWeekData = $transaction_history->whereBetween('created_at', [$lastWeekStartDate, $lastWeekEndDate])
            ->sum('amount');
        
        $thisWeekData = $transaction_history->whereBetween('created_at', [$currentWeekStartDate, $currentWeekEndDate])
            ->sum('amount');
            // dd($lastWeekData, $thisWeekData); 
        if ($lastWeekData != 0 || $thisWeekData != 0) {
            $lastWeekTransactions = $lastWeekData; // Replace with actual value
            $thisWeekTransactions = $thisWeekData; // Replace with actual value
            $percentageIncrease = (($thisWeekTransactions - $lastWeekTransactions) / $lastWeekTransactions) * 100;
        } else {
            $percentageIncrease = 0;
        } 
        // dd($percentageIncrease, $lastWeekData, $thisWeekData);
        if (strpos($percentageIncrease, '-') !== false) {
            $in_minus = 'yes';
        } else {
            $in_minus = 'no';
        }
        $startDate = Carbon::now()->subDays(7)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        // Retrieve data for the last 7 days using the model's query builder 
        $weekly_donation = DonorWalletTransaction::where('donor_id', auth()->user()->id)->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(created_at)'))->get();

        $monthly_donation = DonorWalletTransaction::where('donor_id', auth()->user()->id)
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
            ->get();
        // dd($monthly_donation);
        $wallet = DonorWallet::where('donor_id', auth()->user()->id)->first();
        return view('donor.index', get_defined_vars());
    } 
    
    public function transaction()
    {
        $transaction = DonorWalletTransaction::where('donor_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate();
        return view('donor.transaction_history', get_defined_vars());
    }
  
    public function transfer_funds()
    { 
        return view('donor.transfer_funds');
    }
    
    public function deposit_fund_by_card(Request $request)
    { 
        $donor_wallet_topup = new WalletTopUp;
        $donor_wallet_topup->donor_id = auth()->user()->id;
        $donor_wallet_topup->deposit_type = $request->deposit_type;
        $donor_wallet_topup->deposit_amount = $request->amount;
        $donor_wallet_topup->save(); 
        $check_donor_wallet = DonorWallet::where('donor_id', auth()->user()->id)->first();
        if ($check_donor_wallet != null) {

            $wallet_amount = $check_donor_wallet->wallet_ammount + $request->amount;

            DonorWallet::where('donor_id', auth()->user()->id)->update(array(
                'wallet_ammount' => $wallet_amount
            ));
        } else {
            $wallet_create = new DonorWallet;
            $wallet_create->donor_id = auth()->user()->id;
            $wallet_create->wallet_ammount = $request->amount;
            $wallet_create->save();
        }
        return redirect()->back()->with('success', 'Amount deposit successfuly in to your wallet');
        // if($request->deposit_type == 'using_card'){ 
        // }
    }
}
