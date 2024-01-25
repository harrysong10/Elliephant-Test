<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->unsignedDecimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->string('feature_image', 255)->nullable();
            $table->unsignedDecimal('shipping_cost', 8, 2)->default(0);
            $table->enum('product_status', [
                config('constants.PRODUCT_STATUS.DRAFT'),
                config('constants.PRODUCT_STATUS.PUBLISHED'),
                config('constants.PRODUCT_STATUS.ARCHIVED')
            ])->default(config('constants.PRODUCT_STATUS.DRAFT'));
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
};
