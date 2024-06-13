<?php

namespace App\Http\Controllers\Collector;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonorWallet;
use App\Models\DonorWalletTransaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CollectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $all_donors = User::where('parent_id', auth()->user()->id)->where('account_type', 0)->pluck('id');
        // dd($all_donors);
        $all_donation = DonorWalletTransaction::whereIn('donor_id', $all_donors)->orderBy('id', 'DESC')->limit(10);
        $transaction_history = DonorWalletTransaction::whereIn('donor_id', $all_donors);

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
        $weekly_donation = DonorWalletTransaction::whereIn('donor_id', $all_donors)->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(created_at)'))->get();

        $monthly_donation = DonorWalletTransaction::whereIn('donor_id', $all_donors)
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
            ->get();
        // dd($monthly_donation);
        $wallet = DonorWallet::whereIn('donor_id', $all_donors)->first();
        return view('collector.index', get_defined_vars());
    }
}
