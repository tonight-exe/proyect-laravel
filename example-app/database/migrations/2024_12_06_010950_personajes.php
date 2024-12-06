<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('personajes', function (Blueprint $table) {
            $table->id('id_pj');
            $table->string('name');
            $table->unsignedBigInteger('id_arma');
            $table->unsignedBigInteger('id_armadura');
            $table->integer('age');
            $table->string('img');
            $table->foreign('id_arma')->references('id')->on('items');
            $table->foreign('id_armadura')->references('id')->on('items');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('personajes');
    }
};
