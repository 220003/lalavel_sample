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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 255);
            $table->integer('price');

            //Note:
            // id (Primary Key)
            // created_at, updated_at
            // name (varchar 255)
            // price (int)

            // SQL
            // CREATE TABLE {
            //     id PRIMARY KEY,
            //     created_at TIMESTAMP DEFAULT ...
            //     ....
            // }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};