<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Api\SmartHRAPI;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeamMember extends Controller
{

    public function add()
    {
        $smarthr = new  SmartHRAPI();
        $get = $_GET ? $_GET : [];
        $smarthr->getEmployees($get);

        return  view('admin/team_member/add');
    }
    public function getHREmployees()
    {
        $smarthr = new  SmartHRAPI();
        $filter = $_GET ? $_GET : [];
        $users = User::where("hr_user_id", ">", 0)->get();

        if ($users) {
            $not_ids = [];
            foreach ($users as $u) {
                $not_ids[] = $u->hr_user_id;
            }
            if (!empty($not_ids)) {
                $filter['not_ids'] = implode(',', $not_ids);
            }
        }

        return $smarthr->getEmployees($filter);
    }
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5',
            'role_id' => 'required',

        ]);
 
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->hr_user_id = $request->hr_user_id;
        $user->role_id = $request->role_id;
        $user->save();
        $this->createTeam($user);
        return redirect(route('dashboard'));
    }
      /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
