<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    public function index(){
        
        $secteurs = Sector::all();

        return response()->json($secteurs);
    }

    public function show($id){
        $secteurs = Sector::with(['territoire'])->find($id);

        return response()->json($secteurs);
    }

    

    public function store(Request $req){
            // dd($req);
        $secteurs = new Sector();

        $secteurs->zip_sector = $req->zip_sector;
        $secteurs->lib_sector = $req->lib_sector;
        $secteurs->priority_sector=$req->priority_sector;
        $secteurs->territoire_id = $req->territoire_id;

        $secteurs->save();



    }

    public function update(Request $req){

        $secteurs = Sector::find($req->id);
        

        $secteurs->name = $req->name;
        $secteurs->habitant = $req->habitant;
        $secteurs->ville=$req->ville;
        $secteurs->enable=$req->enable;
        $secteurs->territoire_id = $req->territoire_id;

        $secteurs->save();
    }
    
    public function delete($id){
        $secteurs = Sector::find($id);
        $secteurs->delete();
    }
}
