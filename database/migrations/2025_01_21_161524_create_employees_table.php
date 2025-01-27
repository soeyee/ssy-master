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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('postal_code');
            $table->text('address');
            $table->boolean('gender')->default(0)->comment('0: Male, 1: Female');
           // $table->enum('gender', ['male', 'female', 'other']);
            $table->text('languages')->nullable();
            $table->string('country');
           // $table->boolean('relocation');
            $table->string('pdf_file');
            $table->string('image');
          //  $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
