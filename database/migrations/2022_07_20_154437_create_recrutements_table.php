<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecrutementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recrutements', function (Blueprint $table) {
            $table->id();
            $table->boolean('genre');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('adress');
            $table->integer('commune_id');
            $table->string('image');
            $table->string('cv');
            $table->string('motivation');
            $table->string('cni');
            $table->string('extrait');
            $table->text('profil')->nullable();
            $table->boolean('type');
            $table->integer('user_id');
            $table->integer('job_id');
            $table->boolean('view')->nullable();
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
        Schema::dropIfExists('recrutements');
    }
}
