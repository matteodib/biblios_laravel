<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('titolo');
            $table->integer('anno_pubb');
            $table->integer('isbn');
            $table->string('trama');
            $table->string('copertina');
            $table->integer('copie');
            $table->unsignedBigInteger('argomento_id');
            $table->foreign('argomento_id')->references('id')->on('arguments');
            $table->unsignedBigInteger('editore_id');
            $table->foreign('editore_id')->references('id')->on('publishers');
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
        Schema::dropIfExists('books');
    }
}
