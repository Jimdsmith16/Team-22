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
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name", length: 100);
            $table->float("price", precision: 2);
            $table->text("description");
            $table->string("alt_text", length: 255);
            $table->integer("number_of_stock");
            $table->string("image_link", length: 255);
            $table->integer("average_rating");
            $table->unsignedInteger("category_id");
            $table->foreign("category_id")->references("id")->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
