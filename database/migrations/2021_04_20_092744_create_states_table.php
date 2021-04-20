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
            $table->string('state_type')->default('PROCESS');
            $table->boolean('is_checkpoint')->default(false);
            $table->string('flow_name');
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
        Schema::dropIfExists('states');
    }
}
