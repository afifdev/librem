<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('kind_id');
            $table->foreignId('category_id');
            $table->foreignId('writer_id');
            $table->foreignId('publisher_id');
            $table->foreignId('grade_id')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->boolean('availability')->default(1);
            $table->string('isbn');
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
        Schema::dropIfExists('books');
    }
}
