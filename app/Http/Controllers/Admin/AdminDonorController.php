<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\DonorWalletTransaction;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDonorController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all_donors()
    {
        $all_donors = User::where('account_type', 0)->paginate(10);
        return view('admin.donor.all_donor', get_defined_vars());
    }

    public function donor_profile($id)
    {
        $donor = User::findorfail($id);
        $transation_from_wallet = DonorWalletTransaction::where('donor_id', $id)->sum('amount');
        $bank_info = BankDetail::where('user_id', $id)->first();
        return view('admin.donor.donor_profile', compact('donor', 'transation_from_wallet', 'bank_info'));
    }
    
    public function changeUserStatus(Request $request, $id)
    {
        User::where('id', $id)->update(array(
            'acc_status' => $request->status
        ));
        return response()->json([
            'code' => 200
        ]);
    }

    public function changeBankStatus(Request $request, $id)
    {
        BankDetail::where('id', $id)->update(array(
            'status' => $request->status
        ));
        return response()->json([
            'code' => 200
        ]);
    }
    public function edit_profile($id)
    {
        $donor = User::findorfail($id);
        return view('admin.donor.edit', compact('donor'));
    }

    public function update_donor_account_info(Request $request, $id)
    {

        if ($request->hasFile('profile_avatar')) {
            $attechment = $request->file('profile_avatar');
            $avatar = time() . $attechment->getClientOriginalName();
            $attechment->move(public_path('assets/images/users'), $avatar);
        } else {
            $get_user_details = User::where('id', $id)->first();
            if ($get_user_details->profile_avatar == null) {
                $avatar = 'avatar.jpg';
            } else {
                $avatar = $get_user_details->profile_avatar;
            }
        }

        User::where('id', $id)->update(array(
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'tax_id' => $request->tax_id,
            'email' => $request->email,
            'dob' => $request->dob,
            'profile_avatar' => 'assets/images/users/' . $avatar,
            'acc_status' => $request->acc_status,
            'phone_number' => $request->phone_number,
        ));
        return redirect()->back()->with('success', 'User details updated successfuly');
    }

    public function deposit_funds()
    {
    }
}
