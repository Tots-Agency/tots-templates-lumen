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
        Schema::create('tots_component_function', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('function_id');
            $table->unsignedBigInteger('component_id');
            $table->tinyInteger('status')->nullable(false)->default(0);
            $table->json('data')->nullable(true);
            $table->timestamps();

            $table->foreign('function_id')->references('id')->on('tots_function');
            $table->foreign('component_id')->references('id')->on('tots_template_component');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tots_component_function');
    }
};
