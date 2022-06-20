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
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');/* checked ep37 2723 */
            $table->unsignedBigInteger('order_id');/* checked ep37 2723 */
            $table->integer('quantity')->default(0);/* checked ep37 2838 */
            $table->foreign('product_id')->on('products')->references('id')->onDelete('CASCADE');/* checked ep37 2723 */
            $table->foreign('order_id')->on('orders')->references('id')->onDelete('CASCADE');/* checked ep37 2723 */
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
        Schema::dropIfExists('product_orders');
    }
};
