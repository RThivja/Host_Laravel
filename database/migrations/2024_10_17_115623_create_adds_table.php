<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adds', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->string('Logo');  // Logo as string
            $table->string('href_link');  // URL link
            $table->string('Org_name');  // Organization name
            $table->integer('status')->default(1);  // Status with default value 1
            $table->timestamps();  // created_at, updated_at timestamps
        });
    }
    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adds');
    }
}
