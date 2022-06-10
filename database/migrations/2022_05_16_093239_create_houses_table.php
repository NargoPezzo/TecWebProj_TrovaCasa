<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('locatore_id')->index();
            $table->foreign('locatore_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('titolo');
            $table->float('prezzo');
            $table->string('descrizione',2500);
            $table->string('tipologia');
            $table->tinyInteger('n_camere');
            $table->tinyInteger('n_posti_letto_totali');
            $table->dateTimeTz('data_inserimento');
            $table->date('data_min')->nullable();
            $table->date('data_max')->nullable();
            $table->string('indirizzo');
            $table->char('cap',5);
            $table->string('città');
            $table->char('provincia',2);
            $table->char('genere')->nullable();
            $table->integer('età_min')->unsigned()->nullable();
            $table->integer('età_max')->unsigned()->nullable();
            $table->tinyInteger('opzionato')->default(0);
            $table->integer('superficie')->unsigned();
            $table->text('immagine')->nullable()->default('no_home_icon.jpg');
        });
        
    }
    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}