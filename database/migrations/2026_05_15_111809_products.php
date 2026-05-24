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
        //table for product 
        Schema::create('products',function(Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->cascades('users')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('quantity');
            $table->decimal('price',10,2);
            $table->string('model');
            $table->decimal('discount',10,2);
            $table->string('dimension');
            $table->enum('stock',['in_stock','limited','out_of_stock','pre_order','coming_soon'])->default('in_stock');
            $table->string('image');
            $table->string('gallery');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
