<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewsUsersField extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable();
            $table->string('conformpassword');
            $table->string('country')->nullable();
            $table->string('url')->nullable();
            $table->date('date')->nullable();
        });
    }


}
