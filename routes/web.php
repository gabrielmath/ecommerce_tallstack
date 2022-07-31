<?php

use App\Http\Controllers\Stripe\WebhookController;
use App\Http\Livewire\Admin\{ProductForm, ProductList};
use App\Http\Livewire\CheckoutPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/products', ProductList::class)->name('products');
    Route::get('/products/create', ProductForm::class)->name('products.create');
});

Route::get('/checkout', CheckoutPage::class)->name('checkout');

Route::post('/stripe/webhook', [WebhookController::class, 'handleWebhook']);
