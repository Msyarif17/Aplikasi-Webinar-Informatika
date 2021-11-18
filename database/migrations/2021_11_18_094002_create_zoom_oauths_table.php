<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoomOauthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoom_oauths', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('jadwal_id')->unsigned();
            // $table->foreign('jadwal_id')->references('id')->on('jadwals');
            $table->string('provider');
            $table->string('provider_value');
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
        Schema::dropIfExists('zoom_oauths');
    }
}
