<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->date('datum');
            $table->string('locatie');
            $table->integer('duur');
            $table->integer('diepte');
            $table->String('duikBuddy1');
            $table->String('duikBuddy2');
            $table->String('opmerking');
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
        Schema::dropIfExists('dives');
    }
}