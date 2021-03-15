<?php

use App\Models\PaymentSchedule;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSchedulesTable extends Migration
{

    public function up()
    {
        Schema::create((new PaymentSchedule())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('payment_head_id')->unsigned();
            $table->date('paid_date');
            $table->integer('status')->length('1')->comment("0=deactive,1=active")->default(1);
            $table->integer('payment_status')->length('1')->comment("1=unpaid,2=paid")->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists((new PaymentSchedule())->getTable());
    }
}
