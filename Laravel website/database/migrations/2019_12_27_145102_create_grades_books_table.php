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
            $table->boolean('eenster');
            $table->boolean('tweester');
            $table->boolean('driester');
            $table->boolean('vierster');
            $table->boolean('eensterI');
            $table->boolean('tweesterI');
            $table->boolean('basicNitrox');
            $table->boolean('advancedNitrox');
            $table->boolean('basicTrimix');
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
