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
        Schema::create('services_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->default(0);
            $table->unsignedBigInteger("service_item_id")->default(0);
            $table->string("ip");
            $table->string("order_number");
            $table->integer("status");
            $table->string("device");
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_item_id')->references('id')->on('service_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_orders');
    }
};
