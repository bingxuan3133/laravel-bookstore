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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained();
            $table->string('title');
            $table->string('author');
            $table->string('country');
            $table->string('language');
            $table->string('link');
            $table->integer('pages');
            $table->integer('year');
            $table->foreignId('category_id')->nullable()->constrained();
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
