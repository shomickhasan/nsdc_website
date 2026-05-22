<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('regestrations', function (Blueprint $table) {
            $table->string('emergency_contact_no')->nullable()->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('regestrations', function (Blueprint $table) {
            $table->dropColumn('emergency_contact_no');
        });
    }
};
