<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookWriterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_writer', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('writer_id')->constrained('writers');
            $table->primary(['book_id', 'writer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_writer');
    }
}
