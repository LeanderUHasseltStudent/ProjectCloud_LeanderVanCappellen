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
            $table->boolean('_1ster');
            $table->boolean('_2ster');
            $table->boolean('_3ster');
            $table->boolean('_4ster');
            $table->boolean('_1sterI');
            $table->boolean('_2sterI');
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
