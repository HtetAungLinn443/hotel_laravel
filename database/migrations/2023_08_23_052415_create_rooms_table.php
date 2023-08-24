<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->double('size');
            $table->mediumInteger('occupancy');
            $table->tinyInteger('bed_type_id');
            $table->tinyInteger('view_id');
            $table->longText('description');
            $table->longText('detail');
            $table->integer('price_per_day');
            $table->integer('extra_bed_price_per_day');
            $table->string('thumbnail_img', 200);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};