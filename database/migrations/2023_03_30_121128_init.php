<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("activities", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->time("duration");
            $table->timestamps();
        });

        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
        });

        Schema::create("activity_data", function (Blueprint $table) {
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("activity_id");
            $table->time("point_in_time");
            $table->double("speed");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop("activities");
        Schema::drop("users");
        Schema::drop("activity_data");
    }
};
