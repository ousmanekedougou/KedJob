<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('adress');
            $table->string('image')->nullable();
            $table->integer('is_admin');
            $table->boolean('is_active');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('confirmation_token')->nullable();
            $table->string('slug');
            $table->string('companyLogo')->nullable();
            $table->string('about')->nullable();
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
        Schema::dropIfExists('users');
    }
}
