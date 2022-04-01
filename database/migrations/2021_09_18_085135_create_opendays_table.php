<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpendaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opendays', function (Blueprint $table) {
            $table->id();
            $table->string('day')->nullable();
            $table->string('time_from')->nullable();
            $table->string('time_to')->nullable();
            $table->foreignId('workshop_id')->nullable();
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
        Schema::dropIfExists('opendays');
    }
}
