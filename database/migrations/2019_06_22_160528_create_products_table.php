<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name',255);
            $table->string('slug',255);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('sub_sub__category_id');
            $table->unsignedBigInteger('brand_id');
            $table->mediumText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->text('tags')->nullable();
            $table->string('sku')->unique();
            $table->bigInteger('color_id');
            $table->string('size',20);
            $table->decimal('price',10,2);
            $table->decimal('new_price',10,2)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('sub_sub__category_id')->references('id')->on('sub_sub__categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
