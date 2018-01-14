<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtsauksmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atsauksmes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->integer('vertejums');
            $table->string('komentars', 250);
            
            $table->integer('autors_id')->unsigned();
            $table->foreign('autors_id')->references('id')->on('users');

            $table->integer('vertetais_id')->unsigned();
            $table->foreign('vertetais_id')->references('id')->on('users'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atsauksmes');
    }
}
