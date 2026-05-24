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
        Schema::create('delivery',function(Blueprint $table){
            $table->id();
            $table->foreignId('order_Id')->constriant('orders')->cascadeOnDelete();
            $table->string('address');
            $table->boolean('is_delivered')->default(false);
            $table->string('trackingNumber');
            $table->string('delivery_charge');
            $table->string('estimated_delivery_date');
            $table->string('postalCode');
            $table->enum('label',['Home','Office']);
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
