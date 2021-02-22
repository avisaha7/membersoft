<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('role_id')->default(2);
            $table->integer('share_id')->nullable();
            $table->string('name');
            $table->string('company_address')->nullable();
            $table->string('license_type')->nullable();
            $table->string('nid')->nullable();
            $table->string('phone')->default("017");
            $table->string('image')->default('index.jpg');
            $table->string('dob')->nullable();
            $table->string('joining_date')->nullable();
            $table->boolean('status')->default(false);
            $table->string('email')->unique();
            $table->string('password');
            $table->text('address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('refer')->nullable();
            $table->string('company')->nullable();
            $table->string('nominee_name')->nullable();
            $table->string('nominee_address')->nullable();
            $table->string('nominee_nid')->nullable();
            $table->string('nominee_phone')->nullable();
            $table->string('designation')->nullable();
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
