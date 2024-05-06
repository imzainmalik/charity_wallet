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
        Schema::create('user_additional_infos', function (Blueprint $table) {
            $table->id();
            $table->string('prefix');
            $table->string('addres_1');
            $table->string('addres_2');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->integer('is_addres_primary')->default(0)->comment('0=not primary, 1=primary');
            $table->string('email')->unique();
            $table->text('description');
            $table->integer('is_email_primary')->default(0)->comment('0=not primary, 1=primary');
            $table->string('phone_number');
            $table->string('descrioption');
            $table->integer('is_phone_primary')->default(0)->comment('0=not primary, 1=primary');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_additional_infos');
    }
};
