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
            $table->increments('product_id');
            $table->string("product_name");
            $table->text("product_desc");
            $table->string("product_price");
            $table->string("product_sell_price");
            $table->string("product_stock");
            $table->string("product_featured_image");
            $table->string("product_thumb_image");
            $table->string("product_seller_id");
            $table->string("product_category_id");
            $table->string("product_brand");
            $table->string("product_send_from");
            $table->string("upload_by");
            $table->timestamps();
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
