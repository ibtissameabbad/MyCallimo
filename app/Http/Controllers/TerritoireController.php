<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Territoire;
use App\User;

class TerritoireController extends Controller
{
    public function index(){
        
        $territoires = Territoire::with(['user'])->get();

        return response()->json($territoires);
    }

    public function show($id){
        $territoires = Territoire::with(['user'])->find($id);

        return response()->json($territoires);
    }

    public function users(){
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $req){
            // dd($req);
        $territoires = new Territoire();

        $territoires->name = $req->name;
        $territoires->enable = $req->enable;
        $territoires->enable_sectorimo=$req->enable_sectorimo;
        $territoires->user_id = $req->user_id;

        $territoires->save();
    }

    public function update(Request $req){

        $territoires = Territoire::find($req->id);
        

        $territoires->name = $req->name;
        $territoires->enable = $req->enable;
        $territoires->enable_sectorimo=$req->enable_sectorimo;
        $territoires->user_id = $req->user_id;

        $territoires->save();
    }
    
    public function delete($id){
        $territoires = Territoire::find($id);
        $territoires->delete();
    }

    
}