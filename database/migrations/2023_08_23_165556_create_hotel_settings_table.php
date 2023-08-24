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
        Schema::create('hotel_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('email', 120);
            $table->longText('address');
            $table->time('check_in_time');
            $table->time('check_out_time');
            $table->string('phone');
            $table->string('size_unit', 20);
            $table->string('occupancy', 20);
            $table->string('price_unit', 20);
            $table->string('logo_path', 20);
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
        Schema::dropIfExists('hotel_settings');
    }
};