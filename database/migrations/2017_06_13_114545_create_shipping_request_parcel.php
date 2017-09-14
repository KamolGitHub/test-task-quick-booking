<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingRequestParcel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_request_parcel', function (Blueprint $table) {
            $table->integer('shipping_request_id')->unsigned();
            $table->integer('parcel_id')->unsigned();

            $table->primary(['shipping_request_id', 'parcel_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_request_parcel');
    }
}
