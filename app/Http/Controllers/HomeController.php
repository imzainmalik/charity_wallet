<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\OnlineStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function updateOnlineStatus()
    {
        $check_exist = OnlineStatus::where('id', auth()->user()->id)->first();
        if ($check_exist == null) {
            $online_status = new OnlineStatus;
            $online_status->user_id = auth()->user()->id;
            $online_status->save();
        } else {
            OnlineStatus::where('id', auth()->user()->id)->update(array(
                'user_id' => auth()->user()->id,
                'status' => 1
            ));
        }
    }

    public function checkUserAccType()
    {
        // dd(Auth::user());
        $auth = Auth::user();
        if ($auth->account_type == 2) {
            $this->updateOnlineStatus();
            return redirect()->route('admin.dashboard');
        }

        if ($auth->account_type == 1) {

            if ($auth->acc_status == 0) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is not approved by the Admin yet.');
            }

            if ($auth->acc_status == 1) {
                $this->updateOnlineStatus();
                return redirect()->route('collector.dashboard');
            }

            if ($auth->acc_status == 2) {
                // dd($auth);
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is Suspended by the Admin.');
            }
        }
         if ($auth->account_type == 0) {
            if ($auth->acc_status == 0) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is not approved by the Admin yet.');
            }

            if ($auth->acc_status == 1) {
                $this->updateOnlineStatus();
                return redirect()->route('donor.dashboard');
            }
            if ($auth->acc_status == 2) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is Suspended by the Admin.');
            }
        }
    }

    public function news_feed()
    {
        $all_news = Blog::where('status', 1)->orderBy('id', 'DESC')->get();
        $categories = BlogCategory::where('status', 1)->limit(7)->get();
        return view('news_feed', get_defined_vars());
    }

    public function forum()
    {
        return view('forum');
    }
}
