<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->integer('collector_id');
            $table->string('logo');
            $table->longText('description');
            $table->integer('has_goal')->default(0)->comment('0=no, 1=yes,');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->float('goal_ammount');
            $table->integer('status')->default(0)->comment('0=pending, 1=active, 2=expire, 3=stop by user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
