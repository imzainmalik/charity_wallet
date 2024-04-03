<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonorWalletTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    //

    public function dashboard()
    {
        $transaction_history = DonorWalletTransaction::where('donor_id', auth()->user()->id);

        // $currentDate = Carbon::now();

        $current_week = Carbon::now()->addDays(Carbon::now()->dayOfWeek + 1);

        $last_week = Carbon::now()->subDays(Carbon::now()->dayOfWeek + 5);

        $this_week = $transaction_history->whereDate('created_at', $current_week)->pluck('id')->toArray();
        $last_week = $transaction_history->whereDate('created_at', $last_week)->pluck('id')->toArray();

        // dd($this_week, $last_week); 

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://api.test.yordex.com/users', [
            'body' => '{"email":"user@company.com","roles":["ROLE_TRADER_STANDARD"],"managerUserId":":user-id","approvalLevel":"Director","approvalLimitCurrency":"USD","approvalLimitAmountInCents":10000,"gender":"F"}',
            'headers' => [
                'Authorization' => 'KmSZAd_n-ZVD0wRkiYJ-Zg==',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        $res = $response->getBody();
        dd($res);
        return view('donor.index', compact('transaction_history'));
    }
}
