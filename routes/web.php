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
    Route::get('add-member', [TeamMember::class, 'add'])->name('add_member');
    Route::get('hr-employees', [TeamMember::class, 'getHREmployees'])->name('hr-employees');
    Route::post('save-member', [TeamMember::class, 'store'])->name('save_member');
    Route::post('update-member', [TeamMember::class, 'update'])->name('update_member');
    Route::get('members', [TeamMember::class, 'getData'])->name('members');
    Route::get('members-list', [TeamMember::class, 'index'])->name('members_list');
    Route::get('ticket-users', [TeamMember::class, 'getTicketsUsers'])->name('ticket_users');
    Route::get('edit-member/{id}', [TeamMember::class, 'edit'])->name('edit_member');
    Route::get('delete-member/{id}', [TeamMember::class, 'delete'])->name('delete_member');
    Route::get('add-hr-employee', [TeamMember::class, 'add_hr_employee'])->name('add-hr-employee');
    Route::post('store-hr-employee', [TeamMember::class, 'storeHRUser'])->name('store-hr-employee');
    Route::get('managers-list', [TeamMember::class, 'getManagersList'])->name('managers-list');
    Route::get('branche-list', [TeamMember::class, 'getBranches'])->name('branche-list');
    Route::get('departments-list', [TeamMember::class, 'getDepartments'])->name('departments-list');
    Route::get('work-schedules-list', [TeamMember::class, 'getWorkSchedules'])->name('work-schedules-list');
    Route::get('currencies-list', [TeamMember::class, 'getcurrenciesList'])->name('currencies-list');
    Route::get('hr-roles-list', [TeamMember::class, 'getHRUserRoles'])->name('hr-roles-list');
    Route::get('save-ticket-user', [Ticket::class, 'storeUser'])->name('save_ticket_user');
    
   
});