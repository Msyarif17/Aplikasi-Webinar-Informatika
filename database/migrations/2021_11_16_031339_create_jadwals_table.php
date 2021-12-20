<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('narasumber_id')->unsigned();
            $table->foreign('narasumber_id')->references('id')->on('narasumbers');
            $table->bigInteger('moderator_id')->unsigned();
            $table->foreign('moderator_id')->references('id')->on('moderators');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('link');
            $table->string('thumbnail');
            $table->timestamp('jadwal');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
