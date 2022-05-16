<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->char('name', 200);
            $table->string('slug', 250);
            $table->text('description');
            $table->date('release_date');
            $table->unsignedTinyInteger('rating');
            $table->decimal('ticket_price', 10,2);
            $table->char('country', 50);
            $table->char('genre', 100);
            $table->char('photo', 150);
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
        Schema::dropIfExists('movies');
    }
};
