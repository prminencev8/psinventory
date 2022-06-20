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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); /* checked ep25 2114 */
            $table->unsignedBigInteger('user_id');/* checked ep25 2114 */
            $table->string('order_number',10)->unique();/* checked ep25 2114 */            
            $table->float('sub_total')->default(0);/* checked ep25 2114 */
            $table->float('total_amount')->default(0);/* checked ep25 2114 */            
            $table->string('payment_method')->default('cod');/* checked ep26-27 10123 */
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');/* checked ep26-27 10123 */
            $table->enum('condition',['pending','processing','delivered','cancelled'])->default('pending');/* checked ep26-27 10123 */
            $table->float('delivery_charge')->default(0)->nullable();/* checked ep25 2114 */
            $table->integer('quantity')->default(0);/* checked ep25 2114 */

            $table->string('first_name');/* checked ep25 2255 */           
            $table->string('last_name');/* checked ep25 2255 */
            $table->string('email');/* checked ep28 1732 */
            $table->string('phone');/* checked ep25 2255 */
            $table->string('country')->nullable();/* checked ep 26-17 21808 */
            $table->string('address');/* checked ep25 2255 */
            $table->string('city');/* checked ep25 2255 */
            $table->string('state')->nullable();/* checked ep 26-17 21808 */
            $table->string('postcode')->nullable();/* checked ep 26-17 22029 */
            $table->mediumText('note')->nullable();/* checked ep 26-17 21808 */

            $table->string('sfirst_name');/* checked ep25 2255 */
            $table->string('slast_name');/* checked ep25 2255 */
            $table->string('semail');/* checked ep28 1732 */
            $table->string('sphone');/* checked ep25 2255 */
            $table->string('scountry')->nullable();/* checked ep 26-17 21808 */
            $table->string('saddress');/* checked ep25 2255 */
            $table->string('scity');/* checked ep25 2255 */
            $table->string('spostcode')->nullable();/* checked ep 26-17 22029 */
            $table->string('sstate')->nullable();/* checked ep 26-17 21808 */
            $table->timestamps();/* checked ep25 2255 */
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
};
