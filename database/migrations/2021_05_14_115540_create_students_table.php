<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('password');
            $table->string('name');
            $table->boolean('gender');
            $table->date('born_date');
            $table->string('born_place');
            $table->string('address');
            $table->string('phone_number');
            $table->string('start_year');
            $table->foreignId('grade_id');
            $table->integer('major_id');
            $table->boolean('graduated')->default(0);
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
        Schema::dropIfExists('students');
    }
}
