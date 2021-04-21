<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('alias');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('prev_id')->nullable();
            $table->unsignedBigInteger('next_id')->nullable();
            $table->unsignedInteger('order');
            $table->boolean('is_conditional')->default(false);
            $table->boolean('is_checkpoint')->default(false);
            $table->unsignedBigInteger('flow_id');
            $table->timestamps();

            $table->foreign('flow_id')->references('id')->on('flows')->onDelete('cascade');
            $table->index(['alias','flow_name']);
            $table->unique(['alias','flow_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
