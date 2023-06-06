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
        Schema::create('rate_origin', function (Blueprint $table) {
            $table->id();
            $table->string('rategroup');
            $table->string('code');
            $table->string('destination')->nullable();
            $table->string('country')->nullable();
            $table->string('status')->nullable();
            $table->float('connection_cost')->nullable();
            $table->float('cost_min')->nullable();
            $table->integer('gracetime')->nullable();
            $table->float('init_increment')->nullable();
            $table->float('increment')->nullable();

            $table->unsignedBigInteger('rategroup_id')->nullable();

            $table->foreign('rategroup_id')
            ->references('id')
            ->on('rate_groups')
            ->onDelete('set null');
            

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
        Schema::dropIfExists('rate_origin');
    }
};
