<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkerShortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marker_shorts', function (Blueprint $table) {
            $table->id();
            $table->text('info');
            $table->string('name')->default('Улица Пушкина Дом Колотушкина');
            $table->string('adress');
            $table->string('coord');
            $table->integer('task_num');
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
        Schema::dropIfExists('marker_shorts');
    }
}
