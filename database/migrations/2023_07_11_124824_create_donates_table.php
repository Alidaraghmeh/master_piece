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
        Schema::create('donates', function (Blueprint $table) {
            $table->string('name');
            $table->unsignedBigInteger('NID');
            $table->unsignedBigInteger('phone');
            // $table->unsignedBigInteger('id_orphange');
            // $table->foreign('id_orphange')
            // ->references('id')
            // ->on('orphanage')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');
            $table->string('email')->unique();
            $table->string('card_name');
            $table->unsignedBigInteger('card_number');
            $table->unsignedBigInteger('amount');

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
        Schema::dropIfExists('donates');
    }
};
