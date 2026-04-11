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
        Schema::create('batch_models', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name');
            $table->string('batch_code')->unique();
            $table->string('slug')->unique();
            $table->tinyInteger('status')->default(1)->comment('0=inactive, 1=open, 2=full, 3=batch complete');
            $table->timestamp('open_at')->nullable();
            $table->timestamp('complete_at')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_models');
    }
};
