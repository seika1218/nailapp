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
        Schema::create('nails', function (Blueprint $table) {
            $table->id();
            $table->string('img_path');
            $table->string('explanation');
            // $table->string('nailist_id');
            $table->foreign('nailist_id')->references('id')->on('nailists');
            $table->unique(['user_id', 'month_id']);
            $table->rememberToken();
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
        Schema::dropIfExists('nails');
    }
};