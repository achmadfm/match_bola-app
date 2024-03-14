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
        Schema::create('match', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_club_1');
            $table->unsignedBigInteger('id_club_2');
            $table->unsignedBigInteger('score_club_1')->default(0);
            $table->unsignedBigInteger('score_club_2')->default(0);
            $table->unsignedBigInteger('id_klasmen');
            $table->unique(['id_club_1', 'id_club_2', 'id_klasmen']);
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
        Schema::dropIfExists('match');
    }
};
