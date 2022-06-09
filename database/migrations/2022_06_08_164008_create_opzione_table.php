<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpzioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opzione', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('locatario_id')->index();
            $table->foreign('locatario_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('house_id')->index();
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
            $table->boolean('assegnato')->default(0);
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
        Schema::dropIfExists('opzione');
    }
    
    
    
    
    
}
