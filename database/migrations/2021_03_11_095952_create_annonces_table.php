<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department')->nullable();
            $table->integer('from_site')->nullable();
            $table->integer('is_active')->nullable();
            $table->date('new_price_date')->nullable();
            $table->string('offer_address')->nullable(); 
            $table->string('offer_address_2')->nullable();          
            $table->string('offer_agency_address')->nullable();
            $table->string('offer_agency_email')->nullable();
            $table->string('offer_agency_image')->nullable();
            $table->string('offer_agency_name')->nullable();
            $table->string('offer_agency_siren')->nullable();
            $table->string('offer_agency_siret')->nullable();
            $table->integer('offer_area')->nullable();
            $table->string('offer_area_units')->nullable();
            $table->string('offer_category')->nullable();
            $table->string('offer_chamber')->nullable();
            $table->string('offer_city')->nullable();
            $table->string('offer_code_status')->nullable();
            $table->string('offer_currency')->nullable();
            $table->longText('offer_description')->nullable();
            $table->string('offer_dpe')->nullable();
            $table->string('offer_from_source')->nullable();
            $table->float('offer_full_price')->nullable();
            $table->float('offer_price')->nullable();
            $table->string('offer_gender')->nullable();
            $table->string('offer_ges')->nullable();
            $table->integer('offer_id')->nullable();
            $table->float('offer_last_price')->nullable();
            $table->integer('offer_latitude')->nullable();
            $table->integer('offer_longitude')->nullable();
            // $table->longText('offer_main_image')->nullable();
            $table->date('offer_offline_date')->nullable();
            $table->date('offer_online_date')->nullable();
            $table->integer('offer_pices')->nullable();
            $table->string('offer_piscine')->nullable();
            $table->string('offer_reference')->nullable();
            // $table->longText('offer_slider_image')->nullable();
            $table->integer('offer_status')->nullable();
            $table->string('offer_telephone')->nullable();
            $table->string('offer_telephone_2')->nullable();
            $table->string('offer_telephone_3')->nullable();
            $table->string('offer_title')->nullable();
            $table->string('offer_type')->nullable();
            $table->string('offer_url')->nullable();
            $table->integer('sector_id')->nullable();
            // $table->integer('surface_land')->nullable();
            $table->integer('bathroom')->nullable();
            $table->string('offer_owner_f_name')->nullable();
            $table->string('offer_owner_l_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
