<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('customer_name',100);
            $table->string('customer_phone',32);
            $table->text('address');
            $table->string('city',70);
            $table->string('postal_code',20);
            $table->decimal('total_amount',10,2);
            $table->decimal('discount_amount',10,2)->default('0');
            $table->decimal('paid_amount',10,2);
            $table->string('payment_status',20)->default('pending');
            $table->text('payment_details');
            $table->string('operational_status')->default('pending');
            $table->unsignedBigInteger('processed_by')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('processed_by')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
