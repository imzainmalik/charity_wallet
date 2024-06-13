<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonorWalletTransaction;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {

        $all_donation = DonorWalletTransaction::orderBy('id', 'DESC');

        $donations_sum = $all_donation->sum('amount');

        $weekly_donation = DonorWalletTransaction::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(created_at)'))->get();

        $monthly_donation = DonorWalletTransaction::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
            ->get();

        
        return view('admin.index', get_defined_vars());
    }

}
