<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->decimal('cost')->default(0);
            $table->decimal('price')->default(0);
            $table->unsignedInteger('brand_id');
            $table->string('color')->nullable();
            $table->string('network')->nullable();
            $table->string('size')->nullable();
            $table->string('condition')->nullable();
            $table->string('warranty')->nullable();
            $table->string('serials')->nullable();
            $table->string('status')->default('In Stock');
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
        Schema::dropIfExists('serials');
    }
}
