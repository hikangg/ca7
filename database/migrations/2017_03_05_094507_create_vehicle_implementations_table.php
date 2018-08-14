<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleImplementationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_implementations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid')->index();
            $table->string('name');
            $table->integer('country_id')->index();
            $table->date('introduction_date')->nullable();
            $table->timestamps();
            $table->date('archive_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_implementations');
    }
}
