<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnonceCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonce_calls', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_call');
            $table->date('end_call');
            $table->string('recorder_voice_call');
            $table->string('call_archive');
            $table->longText('remarque');
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
        Schema::dropIfExists('annonce_calls');
    }
}
