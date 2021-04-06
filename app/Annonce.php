<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    //
    protected $fillable = [
        'department','from_site',  'is_active',  'new_price_date', 'offer_address', 'offer_agency_address', 'offer_agency_email', 'offer_agency_image', 'offer_agency_name', 'offer_agency_siren', 'offer_agency_siret', 'offer_area', 'offer_area_units', 'offer_category','offer_chamber', 'offer_city', 'offer_code_status', 'offer_currency', 'offer_description', 'offer_dpe', 'offer_from_source', 'offer_full_price', 'offer_gender','offer_ges', 'offer_id','offer_last_price','offer_latitude', 'offer_longitude','offer_main_image','offer_offline_date','offer_online_date','offer_pices', 'offer_piscine',' offer_price', 'offer_reference','offer_slider_image','offer_status','offer_telephone','offer_title','offer_type','offer_url','sector_id','surface_land','bathroom'
    ];

    public function users(){
        return $this->hasMany('App\User');
    }

    public function sector(){
        return $this->belongsTo('App\Sector');
    }

    public function annonce_call(){
        return $this->belongsTo('App\Annonce_call');
    }
}
