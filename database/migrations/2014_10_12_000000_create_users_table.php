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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name'); 
            $table->string('email')->unique();
            $table->string('phone_number')->unique(); 
            $table->string('tax_id')->nullable();
            $table->string('dob')->nullable();
            $table->string('signup_reason')->nullable(); 
            $table->string('profile_avatar')->nullable(); 
            $table->integer('account_type')->default(0)->comment('0=donor, 1=collector, 2=admin');
            $table->integer('parent_id')->nullable();
            $table->integer('acc_status')->default(0)->comment('0=pending, 1=active, 2=suspend');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('login_method')->default(0)->comment('0-email, 1=google, 2=facebook, 3=twitter, 4=apple'); 
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
