<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->date('date');
            $table->bigInteger('location_id')->unsigned()->index()->nullable();
            $table->foreign('location_id')
            ->references('id')
            ->on('locations')
            ->onDelete('cascade')
            ->onUpdate('cascade'); 
            $table->bigInteger('categorie_id')->unsigned()->index()->nullable();
            $table->foreign('categorie_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade'); 
            $table->bigInteger('organisateur_id')->unsigned()->index()->nullable();
            $table->foreign('organisateur_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade'); 
            $table->string('image')->nullable();
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
        Schema::dropIfExists('events');
    }
}
