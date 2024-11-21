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
        Schema::create('sections', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('course_id');
            $table->string('year'); // Use string to store year ranges like 2024-2025
            $table->string('semester');
            $table->timestamps();

            // Add a unique constraint on (course_id, year, semester)
            $table->unique(['course_id', 'year', 'semester']);

            // Add a foreign key for course_id referencing the courses table
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unique(['id','course_id']);
        });
        // Add a check constraint for the year format using raw SQL
        DB::statement("
            ALTER TABLE sections ADD CONSTRAINT check_year_format
            CHECK (
                year ~ '^[0-9]{4}-[0-9]{4}$' AND
                substring(year, 6, 4)::int = substring(year, 1, 4)::int + 1
            )
        ");
        DB::statement("ALTER TABLE sections ADD CONSTRAINT check_semester CHECK (semester IN ('Fall', 'Spring', 'Summer'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
