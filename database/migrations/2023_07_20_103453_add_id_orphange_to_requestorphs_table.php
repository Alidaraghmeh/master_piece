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
        Schema::table('requestorph', function (Blueprint $table) {
            //
            
            $table->unsignedBigInteger('id_orphange');
            $table->foreign('id_orphange')
            ->references('id')
            ->on('orphanage')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requestorph', function (Blueprint $table) {
            //
        });
    }
};
