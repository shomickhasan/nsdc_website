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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('duration')->nullable();
            $table->longText('short_des')->nullable();
            $table->longText('long_des')->nullable();
            $table->decimal('course_fee', 10, 2)->nullable();
            $table->tinyInteger('status')->nullable()->default(1); 
            $table->tinyInteger('is_show_in_home')->nullable()->default(0);
            $table->string('picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};