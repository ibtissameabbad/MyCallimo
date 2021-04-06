<?php

namespace App\Http\Controllers;

use App\Annonce_call;
use App\Annonce;
use App\UserAnnonce;
use App\Call_type;
use Illuminate\Http\Request;


class AnnonceCallController extends Controller
{
    
        public function index(){
            $call=Annonce_call::all();
            return response()->json($call);
        }

        public function allTypeCall(){
            $typeCall = Call_type::all();
            return response()->json($typeCall);
      
        }
       public function store(Request $req,$id){
        $annonceCall = new Annonce_call();
        $annonceCall->start_call = $req->start_call;
        $annonceCall->end_call = $req->end_call;
        $annonceCall->recorder_voice_call = $req->recorder_voice_call;
        $annonceCall->call_archive = $req->call_archive;
        $annonceCall->remarque = $req->remarque;
        $annonceCall->call_type_id = $req->call_type_id;
        $annonceCall->save();
        $ann = Annonce_call::find($annonceCall->id);
        $annonce = Annonce::find($id);
        $annonce->annonce_call_id = $ann->id;
        $annonce->save();

       }


       public function test(){
           $mydata = file_get_contents('https://solusoft.espaceo.net/ForApis/getMycomptes');
           return $mydata;
       }

       public function sendMail(Request $req){
          $data=array("name"=>"joe");
          Mail::get('sendMail.vue', $data, function ($message) {
              $message->from('ibtissameabbad@gmail.com');
              
              $message->replyTo('ibtissame220@gmail.com');
          
              $message->subject('Subject');
          
            
          
             
          });
          
       }
}
