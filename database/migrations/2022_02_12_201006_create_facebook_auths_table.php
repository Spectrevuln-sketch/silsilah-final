<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacebookAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_auths', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('client_id');
            $table->string('provider_id');
            $table->string('provider');
            $table->string('nickname');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
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
        Schema::dropIfExists('facebook_auths');
    }
}
