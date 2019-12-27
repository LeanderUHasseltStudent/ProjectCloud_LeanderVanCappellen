<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->boolean('1*');
            $table->boolean('2*');
            $table->boolean('3*');
            $table->boolean('4*');
            $table->boolean('Basis-Nitrox');
            $table->boolean('Advanced-Nitrox');
            $table->boolean('Basis-Trimix');
            $table->boolean('1*I');
            $table->boolean('2*I');
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
        Schema::dropIfExists('grades_books');
    }
}
