<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFragmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fragments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('content');
            $table->text('description');
            $table->text('img');
            $table->boolean('finished')->default(false);
            $table->integer('frag_type');
            $table->integer('orb_id');
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
        Schema::dropIfExists('fragments');
    }
}
