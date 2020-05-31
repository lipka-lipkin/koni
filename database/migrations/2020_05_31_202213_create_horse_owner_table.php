<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorseOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horse_owner', function (Blueprint $table) {
            $table->bigInteger('horse_id', false, true);
            $table->bigInteger('owner_id', false, true);

            $table->foreign('horse_id')->on('horses')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('owner_id')->on('owners')->references('id')
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
        Schema::dropIfExists('horse_owner');
    }
}
