<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyConverterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

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
    return view('welcome');
});

Route::get('/verify-phone-number', function () {
    return view('verify');
});

Route::post('verify-number', function (Request $request) {

    $user = Auth::user();

    if ($request->has('otp')) {
        $otp = $request->input('otp');
        // Compare the OTP with the one stored in the session
        if ($otp === $user->OTP) {
            //remove the OTP from the AUthenticated user
            $user->OTP = null;
            $user->save();
            // OTP is valid, proceed with the request
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->withErrors(['message' => 'Incorrect OTP try again']);
        }
    }
});

Route::post('accept-deposit', function (Request $request) {

    $user = Auth::user();
    //find order by order number
    $order = Order::where('number', '=', $request->order)->first();

    $order->agent = $user->id;
    $order->status = 'accepted';
    $order->save();

    return back();
});

Route::get('/dashboard', function () {
    $orders = Order::where('sender', '=', Auth::id())
        ->orWhere('recipient', '=', Auth::id())
        ->get();
    return view('dashboard')->with('orders', $orders);

})->middleware(['auth', 'verified', 'checkOTP'])->name('dashboard');

Route::middleware(['auth', 'checkOTP'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //beneficiaries routes here
    Route::get('/transactions/beneficiaries', [BeneficiaryController::class, 'index'])->name('add_beneficiaries');
    Route::post('/beneficiaries/add', [BeneficiaryController::class, 'addBeneficiary'])->name('save_beneficiaries');
    Route::post('/beneficiaries/connect', [BeneficiaryController::class, 'connectBeneficiary'])->name('connect_beneficiaries');
    Route::post('/users/search', [UserController::class, 'search'])->name('search_beneficiaries');

    Route::get('/countries', [CountryController::class, 'index']);
    Route::get('/countries/{id}', [CountryController::class, 'show']);
    Route::post('/countries', [CountryController::class, 'store']);
    Route::put('/countries/{id}', [CountryController::class, 'update']);
    Route::delete('/countries/{id}', [CountryController::class, 'destroy']);

    // Address routes
    Route::get('/addresses', [AddressController::class, 'index']);
    Route::get('/addresses/{id}', [AddressController::class, 'show']);
    Route::post('/addresses', [AddressController::class, 'store']);
    Route::put('/addresses/{id}', [AddressController::class, 'update']);
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy']);

    // Transaction routes
    Route::get('/transactions/send-money', [TransactionController::class, 'create'])->name('send-money');
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::put('/transactions/{id}', [TransactionController::class, 'update']);
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);

    // Status routes
    Route::get('/statuses', [StatusController::class, 'index']);
    Route::get('/statuses/{status}', [StatusController::class, 'show']);
    Route::post('/statuses', [StatusController::class, 'store']);
    Route::put('/statuses/{status}', [StatusController::class, 'update']);
    Route::delete('/statuses/{status}', [StatusController::class, 'destroy']);

    // Currency converter route
    Route::post('/currency/convert', [CurrencyConverterController::class, 'convertPairs']);

    //orders routes
    Route::post('/orders/create', [OrderController::class, 'createOrder']);

    //AGENT ROUTES HERE
    Route::middleware(['role:Agent'])->group(function () {
        Route::get('/agent/dashboard', [AdminController::class, 'dashboard']);
    });
});

require __DIR__ . '/auth.php';
