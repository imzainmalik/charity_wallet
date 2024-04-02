<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDonorController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Collector\CollectorBankDetailsController;
use App\Http\Controllers\Collector\CollectorCampaignController;
use App\Http\Controllers\Collector\CollectorController;
use App\Http\Controllers\Donor\DonorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Auth::logout();
    return redirect()->route('login');
});

Auth::routes();
Route::get('/register_with_google', [RegisterController::class, 'register_with_google'])->name('register_with_google');
Route::get('/callback/{google}', [RegisterController::class, 'google_callback'])->name('google_callback');
Route::get('/register_with_facebook', [RegisterController::class, 'register_with_facebook'])->name('register_with_facebook');
Route::get('/callback/facebook', [RegisterController::class, 'facebook_callback'])->name('facebook_callback');
Route::get('/checkUserAccType', [HomeController::class, 'checkUserAccType'])->name('checkUserAccType');

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('all-donors', [AdminDonorController::class, 'all_donors'])->name('admin.donors');
    Route::get('donors-profile/{id}', [AdminDonorController::class, 'donor_profile'])->name('admin.donor_profile');
    Route::get('donor/changeUserStatus/{id}', [AdminDonorController::class, 'changeUserStatus'])->name('admin.changeUserStatus');
    Route::get('donor/changeBankStatus/{id}', [AdminDonorController::class, 'changeBankStatus'])->name('admin.changeBankStatus');
    Route::get('edit_profile/{id}', [AdminDonorController::class, 'edit_profile'])->name('admin.edit_profile');
    Route::post('update_donor_account_info/{id}', [AdminDonorController::class, 'update_donor_account_info'])->name('admin.update_donor_account_info');
});


Route::group(['prefix' => 'donor'], function () {
    // dd(Auth::user());
    Route::get('dashboard', [DonorController::class, 'dashboard'])->name('donor.dashboard');
    
});

// Route::middleware(['auth', 'donor'])->prefix('donor')->group(function () {
//     Route::get('dashboard', [DonorController::class, 'dashboard'])->name('dashboard');
// });

Route::group(['prefix' => 'collector'], function () {
    Route::get('dashboard', [CollectorController::class, 'idnex'])->name('collector.dashboard');
    Route::get('create_campaign', [CollectorCampaignController::class, 'create_campaign'])->name('collector.create_campaign');
    Route::post('campaign_create', [CollectorCampaignController::class, 'campaign_create'])->name('collector.campaign_create');
    Route::get('all-campaigns', [CollectorCampaignController::class, 'all_campaigns'])->name('collector.all_campaigns');
    Route::get('campaign/changeCampaignStatus/{id}', [CollectorCampaignController::class, 'changeCampaignStatus'])->name('collector.changeCampaignStatus');
    Route::get('campaign/view-campaign/{id}', [CollectorCampaignController::class, 'view_campaign'])->name('collector.view_campaign');

    Route::get('bank/view-bank', [CollectorBankDetailsController::class, 'view_bank'])->name('collector.view_bank');
    Route::post('bank/create_bank', [CollectorBankDetailsController::class, 'create_bank'])->name('collector.create_bank');
    Route::post('bank/update_bank/{bank_id}', [CollectorBankDetailsController::class, 'update_bank'])->name('collector.update_bank');
    Route::get('transaction_history', [CollectorBankDetailsController::class, 'view_bank'])->name('collector.transaction_history');
});
