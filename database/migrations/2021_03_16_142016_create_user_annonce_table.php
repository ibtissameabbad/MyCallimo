<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnnonceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_annonce', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userDisp_id');
            $table->foreign('userDisp_id')->references('id')->on('users');
            $table->unsignedInteger('userTrait_id');
            $table->foreign('userTrait_id')->references('id')->on('users');
            $table->unsignedInteger('annonce_id');
            $table->foreign('annonce_id')->references('id')->on('annonces');
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
        Schema::dropIfExists('user_annonce');
    }
}
