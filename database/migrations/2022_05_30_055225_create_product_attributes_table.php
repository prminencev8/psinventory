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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');/* checked ep32 635 */
            $table->string('size')->nullable();/* checked ep32 635 */
            $table->float('price')->default(0);/* modified value ep32 402 */        
            $table->integer('stock')->default(0);/* checked ep32 635 */
            $table->foreign('product_id')->on('products')->references('id')->onDelete('cascade');/* checked ep32 635 */
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
        Schema::dropIfExists('product_attributes');
    }
};
