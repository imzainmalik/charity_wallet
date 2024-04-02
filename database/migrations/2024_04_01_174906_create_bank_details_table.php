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
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('bank_name');
            $table->string('bank_account_title');
            $table->integer('bank_account_number');
            $table->integer('swift_code');
            $table->integer('routing_number');
            $table->integer('status')->default(0)->comment('0=active, 1=update_info_needed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_details');
    }
};
