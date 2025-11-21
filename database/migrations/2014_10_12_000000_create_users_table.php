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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('alt_phone')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('login_id');
            $table->string('remember_password');
            $table->string('password');
            $table->enum('status', ['active', 'inactive'])->default('active');
            //foreign keys
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');

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
