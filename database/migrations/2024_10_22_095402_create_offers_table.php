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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->string('heading');  // Corresponds to STRING in Sequelize
            $table->string('image');  // Corresponds to STRING in Sequelize
            $table->string('descriptions');  // Corresponds to STRING in Sequelize
            $table->string('href');  // Corresponds to STRING in Sequelize
            $table->integer('status')->default(1);  // Corresponds to INTEGER in Sequelize with default value
            $table->timestamps();  // Adds created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
