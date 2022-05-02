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
        Schema::create('add_arrange__models', function (Blueprint $table) {
            $table->id();
            $table->text('product');
            $table->string('sum');
            $table->string('name');
            $table->text('tel');
            $table->text('address');
            $table->text('message');
            $table->string('sposob');
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
        Schema::dropIfExists('add_arrange__models');
    }
};
