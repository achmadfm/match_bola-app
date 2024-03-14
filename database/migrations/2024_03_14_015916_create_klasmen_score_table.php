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
        Schema::create('klasmen_score', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klasmen');
            $table->unsignedBigInteger('id_club');
            $table->unsignedInteger('point')->default(0);
            $table->unsignedInteger('win_goal')->default(0);
            $table->unsignedInteger('lose_goal')->default(0);
            $table->unsignedInteger('m')->default(0);
            $table->unsignedInteger('w')->default(0);
            $table->unsignedInteger('l')->default(0);
            $table->unsignedInteger('d')->default(0);
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
        Schema::dropIfExists('klasmen_score');
    }
};
