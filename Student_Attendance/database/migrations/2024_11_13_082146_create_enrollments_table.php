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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->unsignedInteger("student_id");
            $table->unsignedInteger("sec_id");
            $table->unsignedInteger("course_id");
            $table->timestamps();
            $table->foreign("student_id")->references("id")->on("students");
            $table->foreign(["sec_id","course_id"])->references(["id","course_id"])->on("sections");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
