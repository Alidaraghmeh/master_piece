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
        Schema::create('requestorphs', function (Blueprint $table) {
            $table->id();
            $table->string('full-name');
            $table->string('name_orphan');
            $table->string('name_orphanage');
            $table->string('name_user');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('amount'); // Changed to unsignedBigInteger
            $table->string('address');
            $table->unsignedBigInteger('card_number');
            $table->string('card_name');
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
        Schema::dropIfExists('requestorphs');
    }
};
