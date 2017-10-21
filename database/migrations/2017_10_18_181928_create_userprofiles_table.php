<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',100);
            $table->foreign('username')->references('username')->on('usersdatas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('adharno',25);
            $table->string('bloodgrp',5);
            $table->string('curr_addr');
            $table->string('perm_addr');
            $table->string('guardian');
            $table->string('local_guardian');
            $table->string('mobile_no');
            $table->string('job_id');
            $table->string('occupation');
            $table->string('dob');
            $table->integer('age');
            $table->string('guardian_cellno');
        


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
        Schema::dropIfExists('userprofiles');
    }
}
