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
        Schema::create('inquries',function(Blueprint $table){
           $table->id();
           $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
           $table->string('fullName');
           $table->string('email');
           $table->integer('phone');
           $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
           $table->string('inquiry_type');
           $table->string('product_name');
           $table->enum('contact_method',['email','phone','whatshapp']);
           $table->integer('rate');
           $table->text('message');
           $table->string('screenshot');
           $table->enum('status',['pending','processing','resolved'])->default('pending');
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
