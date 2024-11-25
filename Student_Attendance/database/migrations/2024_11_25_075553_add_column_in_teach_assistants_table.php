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
        Schema::table('teach_assistants', function (Blueprint $table) {
            $table->string('teach_assistant_id')->after('id')->unique();
            $table->year('year_of_enrollment')->after('teach_assistant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teach_assistants', function (Blueprint $table) {
            $table->dropColumn('teach_assistant_id');
            $table->dropColumn('year_of_enrollment');
        });
    }
};
