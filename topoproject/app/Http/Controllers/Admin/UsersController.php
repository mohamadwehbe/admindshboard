<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Role;
use Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;use function Symfony\Component\String\u;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{


    public function index()
    {
        $users = User::all();

        return response($users);

    }

//    public function edit(User $user)
//    {
//        if (Gate::denies('edit-users')){
//            return redirect(route('admin.users.index'));
//        }
//        $roles = Role::all();
//        return view('admin.users.edit')->with([
//            'user' => $user,
//            'roles' => $roles
//        ]);
//    }
//
//    public function update(Request $request, User $user)
//    {
//        $user->roles()->sync($request->roles);
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->save();
//        return redirect()->route('admin.users.index');
//    }
    public function getuserbyid($id)
    {
        $user=User::find($id);
        return response($user);
    }
    public function uupdate(Request $request)
    {
        $uid=$request->input('id');
        $uname=$request->input('name');
        $uemail=$request->input('email');
        $user=User::find($uid);
        $user->name=$uname;
        $user->email=$uemail;
        $user->save();
        return response($user);
    }

    public function delete($id)
    {
        $user=User::find($id);
        if ($user!=null){
            $user->delete();
        }
    }
}
