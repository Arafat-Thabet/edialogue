<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{
    public function index()
    {
        $data['user'] = User::find(auth()->user()->id);
        return view('profile/update', $data);
    }
    public function updateInfo(Request $request)
    {
       
        $user_id = auth()->user()->id;
        $validator = $request->validate([
            'name' => 'required|max:255',
           'email' => 'required|email|unique:users,email,' .  $user_id,

        ]);
    
        $user = User::findOrFail($user_id);
   
        $user->name = $request->name;
        $user->email = $request->email;
       
        $user->save();
     
        return returnMsg('success', 'profile', __('Information updated successfully'));
    }
    public function updatePassword(Request $request)
    {
        $user_id = auth()->user()->id;
        $validator = $request->validate([
            'current_password' => 'password|required|max:255',
            'new_password' => 'required|min:5',
            'confirm_password' =>  'required|min:5',
        ]);
        if (isset($_POST['new_password']) && isset($_POST['confirm_password']) && $_POST['new_password'] != $_POST['confirm_password']) {

            return returnMsg('error', 'profile', __('Password is not match'));
        }
        $user = User::findOrFail($user_id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return returnMsg('success', 'profile', __('Information updated successfully'));
    }
}
