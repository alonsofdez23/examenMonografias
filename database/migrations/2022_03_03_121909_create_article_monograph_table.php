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
        Schema::create('article_monograph', function (Blueprint $table) {
            $table->foreignId('article_id')->constrained();
            $table->foreignId('monograph_id')->constrained();
            $table->primary(['article_id', 'monograph_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_monograph');
    }
};
