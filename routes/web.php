<?php

use App\Http\Controllers\admin\Smarterp;
use App\Http\Controllers\admin\TeamMember;
use App\Http\Controllers\admin\Ticket;
use App\Http\Controllers\admin\Task;
use App\Http\Controllers\Profile;
use App\Http\Controllers\Dashboard;
use App\Http\Middleware\SetLang;
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

Route::middleware(['auth:sanctum', 'verified','lang'])->get('/', [Dashboard::class, 'index']);

Route::middleware(['auth:sanctum', 'verified','lang'])->get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

Route::middleware(['admin','lang'])->prefix('admin')->group(function () {
    Route::get('add-member', [TeamMember::class, 'add'])->name('add_member');
    Route::get('hr-employees', [TeamMember::class, 'getHREmployees'])->name('hr-employees');
    Route::post('save-member', [TeamMember::class, 'store'])->name('save_member');
    Route::post('update-member', [TeamMember::class, 'update'])->name('update_member');
    Route::get('members', [TeamMember::class, 'getData'])->name('members');
    Route::get('members-list', [TeamMember::class, 'index'])->name('members_list');
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
    Route::get('add-ticket-user', [Ticket::class, 'add'])->name('add-ticket-user');
    Route::post('save-ticket-user', [Ticket::class, 'storeUser'])->name('save_ticket_user');
    Route::get('ticket-users', [Ticket::class, 'getTicketsUsers'])->name('ticket_users');
    Route::get('groups-list', [Ticket::class, 'getGroupsList'])->name('groups-list');
    Route::get('task-users-list', [Task::class, 'getUsers'])->name('task-users-list');
    Route::get('task-manager-list', [Task::class, 'getManagerUsers'])->name('task-manager-list');
    Route::get('add-task-user', [Task::class, 'add'])->name('add-task-user');
    Route::get('task-dept-list', [Task::class, 'getDepartmentsList'])->name('task-dept-list');
    Route::get('task-roles-list', [Task::class, 'getRolesList'])->name('task-roles-list');
    Route::post('save-task-user', [Task::class, 'storeUser'])->name('save-task-user');
    Route::get('erp-user-list', [Smarterp::class, 'getUsers'])->name('erp-user-list');
    Route::get('add-erp-user', [Smarterp::class, 'add'])->name('add-erp-user');
    Route::get('erp-group-list', [Smarterp::class, 'getGroupsList'])->name('erp-group-list');
    Route::post('save-erp-user', [Smarterp::class, 'storeUser'])->name('save-erp-user');
});
Route::middleware('lang')->group(function () {
Route::get('profile',[Profile::class,'index'])->name('profile');
Route::post('profile/update-info',[Profile::class,'updateInfo'])->name('profile-update-info');
Route::post('profile/update-password',[Profile::class,'updatePassword'])->name('profile-update-password');
});