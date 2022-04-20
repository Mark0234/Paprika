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
        Schema::create('main_home_models', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('slogan');
            $table->text('images');
            $table->text('description');
            $table->text('servis_a');
            $table->text('servis_b');
            $table->text('servis_c');
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
        Schema::dropIfExists('main_home_models');
    }
};
