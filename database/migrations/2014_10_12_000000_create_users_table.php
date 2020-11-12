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
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('contact_no');
            $table->text('address');
            $table->string('pan_card_no')->nullable();
            $table->string('bank_acc_no')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('client_id')->unique();
            $table->string('reference_client_id');
            $table->string('reference_id');
            $table->string('state');
            $table->string('city');
            $table->string('pin_code');
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
