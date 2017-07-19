<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('seller_id');
            $table->string("seller_name");
            $table->string("seller_email")->unique();
            $table->string("seller_hp");
            $table->string("seller_phone");
            $table->string("seller_address");
            $table->string("seller_bank");
            $table->string("seller_bank_account");
            $table->string("seller_image");
            $table->string("seller_owner_name");            
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
        Schema::dropIfExists('sellers');
    }
}
