<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coupon_name');
            $table->string('coupon_code');
            $table->integer('coupon_time');
            $table->integer('coupon_condition');
            $table->integer('coupon_number');
            $table->string('date_start');
            $table->string('date_end');
            $table->integer('status')->default(1);
            $table->integer('limit_bills');
            $table->string('coupon_used')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}