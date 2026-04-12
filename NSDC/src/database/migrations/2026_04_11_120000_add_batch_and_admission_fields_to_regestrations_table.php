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
        Schema::table('regestrations', function (Blueprint $table) {
            $table->foreignId('batch_id')->nullable()->after('course_id')->constrained('batch_models')->nullOnDelete();
            $table->string('admission_status')->default('pending')->after('batch_id');
            $table->timestamp('admitted_at')->nullable()->after('admission_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regestrations', function (Blueprint $table) {
            $table->dropForeign(['batch_id']);
            $table->dropColumn(['batch_id', 'admission_status', 'admitted_at']);
        });
    }
};
