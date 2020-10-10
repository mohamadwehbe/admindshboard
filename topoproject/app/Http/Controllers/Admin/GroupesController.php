<?php

namespace App\Http\Controllers\Admin;

use App\Models\Groupe;
use App\Models\Role;
use App\Models\User;
use App\Models\GroupeUser;
use Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;use function Symfony\Component\String\u;
use Illuminate\Support\Facades\Auth;

class GroupesController extends Controller
{
    public function index()
    {
        $groupes = Groupe::with('users')->get();

        return response($groupes);

    }
    public function insert(Request $request ){
        $name = $request->input('name');
        Groupe::insert([['name'=>$name]]);
    }


//    public function edit(Groupe $groupe)
//    {
//        if (Gate::denies('edit-groupes')){
//            return redirect(route('admin.gropes.index'));
//        }
//        $roles = Role::all();
//        return view('admin.users.edit')->with([
//            'user' => $groupe
//        ]);
//    }
//
//    public function update(Request $request, Groupe $groupe)
//    {
//        $groupe->name = $request->name;
//        $groupe->save();
//        return redirect()->route('admin.groupes.index');
//    }
    public function adduser(Request $request){
        $uid=$request->input('user_id');
        $gid=$request->input('groupe_id');
        GroupeUser::insert([['user_id'=>$uid,'groupe_id'=>$gid]]);
    }
    public function getgrbyid($id)
    {
        $groupe=Groupe::find($id);
        return response($groupe);
    }
    public function gupdate(Request $request)
    {
        $gid=$request->input('id');
        $gname=$request->input('name');
        $groupe=Groupe::find($gid);
        $groupe->name=$gname;
        $groupe->save();
        return response($groupe);
    }

    public function delete($id)
    {
        $groupe=Groupe::find($id);
        if ($groupe!=null){
            $groupe->delete();
        }
    }
}
