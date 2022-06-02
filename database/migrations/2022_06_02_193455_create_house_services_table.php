<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_services', function (Blueprint $table) {
            
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('house_id')->index();
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
            $table->unsignedBigInteger('services_id')->index();
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_services');
    }
}
