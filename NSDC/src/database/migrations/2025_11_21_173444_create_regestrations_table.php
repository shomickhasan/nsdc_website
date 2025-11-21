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
        Schema::create('regestrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->nullable(); // optional relation to courses
            $table->string('name');
            $table->string('name_bn');
            $table->string('email');
            $table->string('phone');
            $table->string('dob'); // storing date as string
            $table->string('nid_number');
            $table->string('father_name');
            $table->string('father_name_bn');
            $table->string('mother_name');
            $table->string('mother_name_bn');
            $table->string('present_address', 500);
            $table->string('permanent_address', 500);
            $table->string('gender');
            $table->string('education');
            $table->string('religion');
            $table->string('height');
            $table->string('weight');
            $table->string('photo'); // store path
            $table->string('signature'); // store path
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regestrations');
    }
};
