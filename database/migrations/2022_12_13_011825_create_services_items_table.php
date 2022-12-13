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
        Schema::create('service_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("service_category_id")->default(0);
            $table->string("name");
            $table->string("slug");
            $table->longText("description");
            $table->string("image");
            $table->bigInteger("price");
            $table->integer("total_days");
            $table->timestamps();

            $table->foreign('service_category_id')->references('id')->on('service_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_items');
    }
};
