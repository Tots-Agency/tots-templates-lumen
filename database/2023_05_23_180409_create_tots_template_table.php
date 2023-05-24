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
        Schema::create('tots_template', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250)->nullable(false);
            $table->string('slug', 250)->nullable(false);
            $table->tinyInteger('type')->nullable(false)->default(0);
            $table->tinyInteger('status')->nullable(false)->default(0);
            $table->longText('css_global')->nullable(true);
            $table->longText('js_global')->nullable(true);
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
        Schema::dropIfExists('tots_template');
    }
};
