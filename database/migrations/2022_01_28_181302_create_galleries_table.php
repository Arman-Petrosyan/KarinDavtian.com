<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jewellery_id')
                  ->nullable()
                  ->references('id')
                  ->on('jewelleries')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('collage_id')
                  ->nullable()
                  ->references('id')
                  ->on('collages')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->boolean('is_main')->default(0);
            $table->string('name');
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
        Schema::dropIfExists('galleries');
    }
}
