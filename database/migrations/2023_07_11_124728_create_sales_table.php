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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
         
            $table->string('name_product');
            $table->string('buyer_name');
            $table->string('buyer_phone');
            $table->string('card_name');
            $table->string('card_number');
            $table->float('Total', 10, 2); // The second argument (10) is the total number of digits, and the third argument (2) is the number of decimal places
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
        Schema::dropIfExists('sales');
    }
};
