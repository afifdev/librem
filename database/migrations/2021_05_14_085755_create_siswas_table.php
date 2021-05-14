<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->char('nis', 8);
            $table->string('password', 128);
            $table->string('name', 50);
            $table->tinyInteger('gender');
            $table->date('born_date');
            $table->string('born_place', 50);
            $table->string('address', 50);
            $table->string('phone', 20);
            $table->string('start_year', 4);
            $table->foreignId('grade_id')->nullable();
            $table->foreignId('classroom_id')->nullable();
            $table->string('status', 10);
            $table->boolean('is_super')->default(false);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('grade_id')
                ->references('id')->on('grades')
                ->onDelete('cascade');

            $table->foreign('classroom_id')
                ->references('id')->on('classrooms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
