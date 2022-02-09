<?php

use App\Http\Controllers\admin\TeamMember;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/', [Dashboard::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('add-member', [TeamMember::class, 'add']);
    Route::get('hr-employees', [TeamMember::class, 'getHREmployees']);
    Route::post('save-member', [TeamMember::class, 'store'])->name('save_member');;
    
});