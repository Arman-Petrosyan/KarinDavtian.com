<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJewelleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jewelleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')
                  ->nullable()
                  ->references('id')
                  ->on('jewellery_types')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('edition_type')->nullable();
            $table->string('materials')->nullable();
            $table->string('dimensions')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('jewelleries');
    }
}
