<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookPublisherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_publisher', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('publisher_id')->constrained('publishers');
            $table->primary(['book_id', 'publisher_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_publisher');
    }
}
