<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('adress');
            $table->string('date');
            $table->string('lieu');
            $table->text('profile')->nullable();
            $table->text('experience')->nullable();
            $table->string('cv')->nullable();
            $table->string('cni')->nullable();
            $table->string('motivation')->nullable();
            $table->string('diplome')->nullable();
            $table->integer('domaine_id');
            $table->integer('user_id');
            $table->boolean('status');
            $table->boolean('type');
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
        Schema::dropIfExists('candidats');
    }
}
