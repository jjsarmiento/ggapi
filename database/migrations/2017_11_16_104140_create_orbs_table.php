<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrbsTable extends Migration
{
    /**
     
     Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orbs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('consecutive');
            $table->text('img');
            $table->text('tag');
            $table->boolean('access');
            $table->integer('owner_id');
            $table->softDeletes();
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
        Schema::dropIfExists('orbs');
    }
}
