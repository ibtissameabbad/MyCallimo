<?php

namespace App\Http\Controllers;

use App\Mail\sendEmail;
use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    //
    public function sendMail(){
        $data = [
            "to" => "ibtissameabbad@gmail.com",
            "A"=> "ibtissame220@gmail.com",
            "objectif" => "test",
            "content" => "test Content Bojour tot le monde",
        ];
         
        return response()->json([
            'data' => $data,
        ]);
        

    }

    public function store(Request $req){
        $data = [
            "objectif" =>$req->objectif,
            "content" => $req->content,
        ];
        return sendEmail($data);
    }
}
