<?php

namespace App\Http\Controllers;
use App\Annonce;
use App\User;
use App\UserAnnonce;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index(){
        $annonces= Annonce::paginate(20);
        return response()->json($annonces);
    }


    public function show(){
        $annonces = Annonce::with('sector')->get();
        return response()->json($annonces);
    }

    public function getAnnonces(){
        $data = file_get_contents('https://myspace.espaceo.net/api/get-pap-offers');
        return $data;
    }

    public function getAnnonceById($id){
        $annonce = Annonce::with('sector')->find($id);
        return response()->json($annonce);
    }

    public function dispatcher(Request $req){
                //   dd($req);
                 foreach($req->annonce_id as $ann_id) { 
                    $userAnnonces= new UserAnnonce();
                    $userAnnonces->userDisp_id = $req->userDisp_id;
                    $userAnnonces->userTrait_id = $req->userTrait_id;
                    $userAnnonces->annonce_id = $ann_id;
                    
                    $userAnnonces->save();
                }
    } 


    public function showAnnonceAtraiter(){
        $user=auth('api')->user()->id;
        $coller=UserAnnonce::with(['annonce','user'])->where('userTrait_id',$user)->get();
        return response()->json($coller);
 
    }

    public function store(Request $req){
    
        $data=file_get_contents('https://myspace.espaceo.net/api/get-pap-offers');
        $reponses =json_decode($data);
        // dd($reponse);
        foreach($reponses as $req){

             DB::table('annonces')->insert([
            'department' => $req->department,
            'from_site' => $req->from_site,
           'is_active' => $req->is_active,
            'new_price_date' => $req->new_price_date,
            'offer_address' => $req->offer_address,
            'offer_agency_address' => $req->offer_agency_address,
            'offer_agency_email' => $req->offer_agency_email,
            'offer_agency_image' => $req->offer_agency_image,
           'offer_agency_name' => $req->offer_agency_name,
            'offer_agency_siren' => $req->offer_agency_siren,
            'offer_agency_siret' => $req->offer_agency_siret,
            'offer_area' => $req->offer_area,
            'offer_area_units' => $req->offer_area_units,
            'offer_category' => $req->offer_category,
            'offer_chamber' => $req->offer_chamber,
            'offer_city' => $req->offer_city,
            'offer_code_status' => $req->offer_code_status,
            'offer_currency' => $req->offer_currency,
            'offer_description' => $req->offer_description,
            'offer_dpe' => $req->offer_dpe,
            'offer_from_source' => $req->offer_from_source,
            'offer_full_price' => floatval(str_replace('€','',$req->offer_full_price)),
            'offer_gender' => $req->offer_gender,
            'offer_ges' => $req->offer_ges,
            'offer_id' => $req->offer_id,
            'offer_last_price' => $req->offer_last_price,
            'offer_latitude' => $req->offer_latitude,
            'offer_longitude' => $req->offer_longitude,
            'offer_price' => floatval($req->offer_price),
           'offer_offline_date' => $req->offer_offline_date,
            'offer_online_date' => $req->offer_online_date,
            'offer_pices' => $req->offer_pices,
            'offer_piscine' => $req->offer_piscine,
            'offer_reference' => $req->offer_reference,
            'offer_status' => $req->offer_status,
            'offer_telephone' => $req->offer_telephone,
            'offer_title' => $req->offer_title,
            'offer_type' => $req->offer_type,
            'offer_url' => $req->offer_url,
            'sector_id' => $req->sector_id,
            'bathroom' => $req->bathroom,
            ]);

            
            
        }
        return 'success';
    }


    public function update(Request $req){

        $annonce = Annonce::find($req->id);
        $annonce->department = $req->department;
        $annonce->from_site = $req->from_site;
        $annonce->is_active = $req->is_active;
        $annonce->department = $req->department;
        $annonce->new_price_date = $req->new_price_date;
        $annonce->offer_address = $req->offer_address;
        $annonce->offer_agency_address = $req->offer_agency_address;
        $annonce->offer_agency_email = $req->offer_agency_email;
        $annonce->offer_agency_image = $req->offer_agency_image;
        $annonce->offer_agency_name = $req->offer_agency_name;
        $annonce->offer_agency_siren = $req->offer_agency_siren;
        $annonce->offer_agency_siret = $req->offer_agency_siret;
        $annonce->offer_area = $req->offer_area;
        $annonce->offer_area_units = $req->offer_area_units;
        $annonce->offer_category = $req->offer_category;
        $annonce->offer_chamber = $req->offer_chamber;
        $annonce->offer_city = $req->offer_city;
        $annonce->offer_code_status = $req->offer_code_status;
        $annonce->offer_currency = $req->offer_currency;
        $annonce->offer_description = $req->offer_description;
        $annonce->offer_dpe = $req->offer_dpe;
        $annonce->offer_from_source = $req->offer_from_source;
        $annonce->offer_full_price = $req->offer_full_price;
        $annonce->offer_gender = $req->offer_gender;
        $annonce->offer_ges = $req->offer_ges;
        $annonce->offer_id = $req->offer_id;
        $annonce->offer_last_price = $req->offer_last_price;
        $annonce->offer_latitude = $req->offer_latitude;
        $annonce->offer_longitude = $req->offer_longitude;
        $annonce->offer_price = $req->offer_price;
        $annonce->offer_offline_date = $req->offer_offline_date;
        $annonce->offer_online_date = $req->offer_online_date;
        $annonce->offer_pices = $req->offer_pices;
        $annonce->offer_piscine = $req->offer_piscine;
        $annonce->offer_price = $req->offer_price;
        $annonce->offer_reference = $req->offer_reference;
        $annonce->offer_status = $req->offer_status;
        $annonce->offer_telephone = $req->offer_telephone;
        $annonce->offer_title = $req->offer_title;
        $annonce->offer_type = $req->offer_type;
        $annonce->offer_url = $req->offer_url;
        $annonce->sector_id = $req->sector_id;
        $annonce->bathroom = $req->bathroom;
        $annonce->annonce_call_id = $req->annonce_call_id;

        $annonce->save();
        

    }



    public function userAnonces(){
        $userannonces= UserAnnonce::with('annonces');
        return response()->json($userannonces);

    }



    public function pushSimilarIds(){
        $data = UserAnnonce::all();  
        $data1 = file_get_contents('https://myspace.espaceo.net/api/get-pap-offers');
        $dataId = json_decode($data1);
        $tableau = array();
        foreach($dataId as $dt1){
            foreach($data as $dt){
                if($dt1->id == $dt->annonce_id){
                array_push($tableau,array(
                    "id" => $dt1->id
                ));
            }
            }
            
        }
        return $tableau;
    }
    
}