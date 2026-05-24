<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('transfer_route_id')->nullable();
            $table->foreignId('route_id')->nullable();
            
            $table->string('customer_name')->nullable();
            $table->string('name')->nullable(); 
            $table->string('customer_phone')->nullable();
            $table->string('phone')->nullable(); 
            $table->string('customer_email')->nullable();
            $table->string('email')->nullable(); 
            
            $table->integer('seats_booked')->default(1);
            $table->integer('number_of_seats')->default(1); 
            $table->dateTime('booking_date')->nullable();
            
            $table->string('status')->default('pending'); 
            
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};