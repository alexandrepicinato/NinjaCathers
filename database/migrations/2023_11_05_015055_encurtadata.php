<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encurtaurls', function (Blueprint $table) {
            $table->id();
            $table->string('ninjaurl');
            $table->string('debugurl');
            $table->string('debugactive');
            $table->string('enderecoip');
            $table->string('daterequest');
            $table->string('navegador');
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
        //
    }
};
