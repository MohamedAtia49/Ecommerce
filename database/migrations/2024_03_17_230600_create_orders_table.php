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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->text('note');
            $table->enum('payment_method',['cash_delivery','online_shopping']);
            $table->enum('state', array('pending', 'accepted', 'rejected', 'delivered', 'declined'))->default('pending');
            $table->foreignId('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('governorate_id')->references('id')->on('governorates')->onUpdate('cascade')->onDelete('cascade');
            $table->string('total_products');
            $table->double('total' ,8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
