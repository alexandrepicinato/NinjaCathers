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
        Schema::create('requestlogs', function (Blueprint $table) {
            $table->string('idrequest');
            $table->string('requestcontentpost');
            $table->string('requestcontentget');
            $table->string('requestcontentbody');
            $table->string('requestsendto');
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
