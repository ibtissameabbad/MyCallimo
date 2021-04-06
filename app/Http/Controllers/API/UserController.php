<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Facade\FlareClient\Http\Response;
use App\User;
use App\Role;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Response $req){ 
        // if(auth('api')->user() ){
            if(Gate::allows("isAdmin")){
            $coller=User::with(['role','annonces'])->get();
            return response()->json($coller);
            }
      

    }

  public function show($id){
      $user = User::with(['role','annonces'])->find($id);

      return response()->json($user);
  }

  public function roles(){
      $roles = Role::all();
      return response()->json($roles);
  }



  public function store(Request $req){
          // dd($req);
      $user = new User();

      $user->f_name = $req->f_name;
      $user->l_name = $req->l_name;
      $user->phone = $req->phone;
      $user->password = Hash::make(123456789);
      $user->email = $req->email;
      $user->chat_status =  $req->chat_status;
      $user->role_id = $req->role_id;
      $user->parent_user_id = $req->parent_user_id;

      $user->save();
  }

  public function update(Request $req){
      $user = User::find($req->id);
      

      $user->f_name = $req->f_name;
      $user->l_name = $req->l_name;
      $user->phone = $req->phone;
      $user->email = $req->email;
      $user->role_id = $req->role_id;
      $user->parent_user_id = $req->parent_user_id;

      $user->save();
  }

  public function delete($id){

      $user = User::find($id);
      $user->delete();
  }

  public function getTeams($id){
      $teams = User::with('annonces')->where('parent_user_id',$id)->get();

      return response()->json($teams);
  }


    public function profile()
    {
        return auth('api')->user();
    }

    

}
