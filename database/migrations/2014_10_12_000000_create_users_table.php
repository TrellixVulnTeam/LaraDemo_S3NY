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
		
	    $table->increments('id');
	    $table->string('name', 50);
	    $table->string('account', 50)->unique();
	    $table->string('password', 60);
	    $table->integer('type')->default(0);
	    $table->tinyInteger('sex')->default(0);
	    $table->decimal('height')->default(0);
	    $table->decimal('weight')->default(0);
	    $table->string('interest', 100)->default('');
	    $table->string('introduce', 500)->default('');
	    $table->string('picture', 50)->default('');
	    $table->tinyInteger('enabled')->default(1);
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
