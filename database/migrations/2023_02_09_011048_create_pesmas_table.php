<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesmas', function (Blueprint $table) {
            $table->id();
            $table->string('ime')->unique();
            $table->foreignId('album_id');
            $table->integer('trajanje');
            $table->integer('dodatan_izvodjac')->nullable();
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
        Schema::dropIfExists('pesmas');
    }
};
