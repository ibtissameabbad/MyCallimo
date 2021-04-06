<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCallTypeToAnnonceCalls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('annonce_calls', function (Blueprint $table) {
            //
            $table->unsignedInteger('call_type_id')->nullable();
            $table->foreign('call_type_id')->references('id')->on('call_types')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('annonce_calls', function (Blueprint $table) {
            //
        });
    }
}
