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
        Schema::create('attendance', function (Blueprint $table) {
            $table->unsignedInteger("student_id");
            $table->unsignedInteger("lecture_id");
            $table->timestamps();
            $table->primary(["lecture_id","student_id"]);
            $table->foreign("student_id")->references("id")->on("students");
            $table->foreign("lecture_id")->references("id")->on("lectures");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
