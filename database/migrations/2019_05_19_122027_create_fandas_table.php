<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fandas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Registration');
            $table->datetime('appointment');
            $table->unsignedBigInteger('refer_idType');
            $table->foreign('refer_idType')->references('id')->on('phtypes')->onDelete('cascade');
            $table->unsignedBigInteger('refer_idSta');
            $table->foreign('refer_idSta')->references('id')->on('phstatuses')->onDelete('cascade');
            $table->string('remarks');
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
        Schema::dropIfExists('fandas');
    }
}
