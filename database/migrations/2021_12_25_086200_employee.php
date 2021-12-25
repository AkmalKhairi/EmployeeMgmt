<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table){
            $table ->id();
            $table ->string('last_name');
            $table ->string('first_name');
            $table ->string('middle_name');
            $table ->string('address');
            $table ->UnsignedBigInteger('department_id');
            $table ->UnsignedBigInteger('country_id');
            $table ->UnsignedBigInteger('state_id');
            $table ->UnsignedBigInteger('city_id');
            $table ->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            $table ->foreign('country_id')->references('id')->on('country')->onDelete('cascade');
            $table ->foreign('state_id')->references('id')->on('state')->onDelete('cascade');
            $table ->foreign('city_id')->references('id')->on('city')->onDelete('cascade');
            $table ->char('zip_code')->nullable();
            $table ->date('birth_date')->nullable();
            $table ->date('date_hired')->nullable();
            $table ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
