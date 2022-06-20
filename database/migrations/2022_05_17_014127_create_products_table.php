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
            $table->id();
            $table->string('title');           
            $table->string('slug')->unique();
            $table->mediumText('summary');
            $table->longText('description')->nullable();            
            $table->longText('additional_info')->nullable();/* checked ep33 211 */
            $table->longText('return_cancellation')->nullable();/* checked ep33 211 */
            $table->integer('stock')->default(0);

            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('user_id')->nullable();/* checked ep41 1256*/           
            $table->unsignedBigInteger('child_cat_id')->nullable();
            $table->string('photo');           
            $table->float('price')->default(0);                        
            $table->string('size')->nullable();/* diff */           
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('added_by')->nullable();/* checked ep41 1256*/

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');                
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
