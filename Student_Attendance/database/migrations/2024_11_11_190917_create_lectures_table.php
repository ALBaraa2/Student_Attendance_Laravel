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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("course_id");
            $table->unsignedInteger("sec_id");
            $table->string("title");
            $table->date("date");
            $table->time("time");
            $table->string("location");
            $table->timestamps();
            $table->foreign("sec_id")->references("id")->on("sections");
            $table->foreign("course_id")->references("id")->on("sections");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
