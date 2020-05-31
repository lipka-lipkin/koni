<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorseRiderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horse_rider', function (Blueprint $table) {
            $table->bigInteger('rider_id', false, true);
            $table->bigInteger('horse_id', false, true);

            $table->foreign('rider_id')->on('riders')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('horse_id')->on('horses')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horse_rider');
    }
}
