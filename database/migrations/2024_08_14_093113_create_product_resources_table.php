<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->text('resource')->nullable();
            $table->string('resouce_type')->nullable();
            $table->integer('total_download')->nullable();
            $table->integer('status')->nullable();
            $table->dateTime('last_downloaded')->nullable();
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
        Schema::dropIfExists('product_resources');
    }
}
