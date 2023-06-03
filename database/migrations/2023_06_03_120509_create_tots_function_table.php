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
        Schema::create('tots_function', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250)->nullable(false);
            $table->string('slug', 250)->nullable(false)->index();
            $table->tinyInteger('type')->nullable(false)->default(0);
            $table->tinyInteger('status')->nullable(false)->default(0);
            $table->json('data')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tots_function');
    }
};
