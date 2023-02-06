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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('account_id');
            $table->string('email', 100)->unique();
            $table->string('first_name',20);
            $table->string('last_name',20);
            $table->string('display_picture_link',100);
            $table->string('password');
            $table->foreignId("role_id")->constrained("roles", "role_id");
            $table->foreignId("gender_id")->constrained("genders", "gender_id");
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
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
};
