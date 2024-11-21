<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string("course_id")->unique();
            $table->string("name");
            $table->string("description");
            $table->timestamps();
        });

        DB::statement("ALTER TABLE courses ADD CONSTRAINT check_course_id CHECK (course_id ~ '^[A-Za-z]{4}\d{4}$')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
