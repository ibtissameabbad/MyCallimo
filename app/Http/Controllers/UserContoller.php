<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Role;
class UserContoller extends Controller
{
    //

    public function index(){

        $users = User::with(['role'])->get();

        return response()->json($users);
    }

    public function show($id){
        $user = User::with(['role'])->find($id);

        return response()->json($user);
    }

    public function roles(){
        $roles = Role::all();
        return response()->json($roles);
    }



    public function store(Request $req){
        $user = new User();

        $user->f_name = $req->f_name;
        $user->l_name = $req->l_name;
        $user->salary = $req->salary;
        $user->phone = $req->phone;
        $user->password = Hash::make(123456789);
        $user->email = $req->email;
        $user->role_id = $req->role_id;

        $user->save();
    }

    public function update(Request $req){
        $user = User::find($req->id);
        

        $user->f_name = $req->f_name;
        $user->l_name = $req->l_name;
        $user->salary = $req->salary;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->role_id = $req->role_id;

        $user->save();
    }

    public function delete($id){

        $user = User::find($id);
        $user->delete();
    }

    
    
}
