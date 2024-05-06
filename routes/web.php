<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDonorController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Collector\CollectorBankDetailsController;
use App\Http\Controllers\Collector\CollectorCampaignController;
use App\Http\Controllers\Collector\CollectorController;
use App\Http\Controllers\Donor\DonorController;
use App\Http\Controllers\HomeController;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great----!
|
*/
// session m rkh

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
    Route::get('blog/index', [AdminBlogController::class, 'index'])->name('admin.blog.index');
    Route::get('blog/index', [AdminBlogController::class, 'index'])->name('admin.blog.index');
    Route::get('blog/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
    Route::post('blog/save', [AdminBlogController::class, 'save_blog'])->name('admin.blog.save');
    Route::get('blog/edit/{id}', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('blog/update/{id}', [AdminBlogController::class, 'update'])->name('admin.blog.update');
    Route::get('deposit_funds', [AdminDonorController::class, 'deposit_funds'])->name('admin.deposit_fund');
    Route::get('blog/category', [AdminBlogController::class, 'category_index'])->name('admin.blog.category');
    Route::post('blog/category_save', [AdminBlogController::class, 'category_save'])->name('admin.blog.category_save');
    Route::post('blog/category/update/{id}', [AdminBlogController::class, 'category_update'])->name('admin.blog.update');
});
Route::group(['prefix' => 'donor'], function () {
    // dd(Auth::user());
    Route::get('dashboard', [DonorController::class, 'dashboard'])->name('donor.dashboard');
    Route::get('transaction-history', [DonorController::class, 'transaction'])->name('donor.transaction');
    Route::get('transfer-funds', [DonorController::class, 'transfer_funds'])->name('donor.transfer_funds');
    Route::post('deposit_fund_by_card', [DonorController::class, 'deposit_fund_by_card'])->name('donor.deposit_fund_by_card');
});     
// Route::middleware(['auth', 'donor'])->prefix('donor')->group(function () {
//     Route::get('dashboard', [DonorController::class, 'dashboard'])->name('dashboard');
// });  
Route::group(['prefix' => 'collector'], function () {
    Route::get('dashboard', [CollectorController::class, 'index'])->name('collector.dashboard');
    Route::get('create_campaign', [CollectorCampaignController::class, 'create_campaign'])->name('collector.create_campaign');
    Route::post('campaign_create', [CollectorCampaignController::class, 'campaign_create'])->name('collector.campaign_create');
    Route::get('all-campaigns', [CollectorCampaignController::class, 'all_campaigns'])->name('collector.all_campaigns');
    Route::get('campaign/changeCampaignStatus/{id}', [CollectorCampaignController::class, 'changeCampaignStatus'])->name('collector.changeCampaignStatus');
    Route::get('campaign/view-campaign/{id}', [CollectorCampaignController::class, 'view_campaign'])->name('collector.view_campaign');

    Route::get('bank/view-bank', [CollectorBankDetailsController::class, 'view_bank'])->name('collector.view_bank');
    Route::post('bank/create_bank', [CollectorBankDetailsController::class, 'create_bank'])->name('collector.create_bank');
    Route::post('bank/update_bank/{bank_id}', [CollectorBankDetailsController::class, 'update_bank'])->name('collector.update_bank');
    Route::get('transaction_history', [CollectorBankDetailsController::class, 'transaction_history'])->name('collector.transaction_history');
}); 
// Front
Route::get('campaign/{id}', [CampaignController::class, 'campaign'])->name('home.campaign');
Route::get('chat-home', [ChatController::class, 'index'])->name('chat.home');
Route::get('chat-conversation/{id}/{name}', [ChatController::class, 'conversation'])->name('chat.conversation');
Route::post('send_message/{id}', [ChatController::class, 'send_message'])->name('chat.send_message');
Route::post('updates_online_status', [ChatController::class, 'updates_online_status'])->name('chat.updates_online_status');
Route::post('getActiveStatus', [ChatController::class, 'getActiveStatus'])->name('chat.getActiveStatus');
Route::get('news-feed', [HomeController::class, 'news_feed'])->name('home.news_feed');
Route::get('forum', [HomeController::class, 'forum'])->name('home.forum');
