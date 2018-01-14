<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBraucieniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('braucieni', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('starts');
            $table->string('merkis');
            $table->decimal('cena', 5, 2);  
            $table->datetime('izbrauksana');
            $table->integer('pasazieru sk');
            $table->string('piezimes', 1000);
            
            $table->integer('vaditaja_id')->unsigned();
            $table->foreign('vaditaja_id')->references('id')->on('users'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('braucieni');
    }
}
