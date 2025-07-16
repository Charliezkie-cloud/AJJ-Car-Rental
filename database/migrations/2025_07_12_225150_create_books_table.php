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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("name");
            $table->string("email");
            $table->string("contact_number");
            $table->string("address");
            $table->longText("message");
            
            $table->string("rental_option");
            $table->foreignId("car_id")->nullable();
            $table->dateTime("start_date_time");
            $table->dateTime("end_date_time");
            $table->foreignId("delivery_id")->nullable();

            $table->decimal("total");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
