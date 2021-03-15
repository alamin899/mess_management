<?php

use App\Models\PaymentCollection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCollectionsTable extends Migration
{

    public function up()
    {
        Schema::create((new PaymentCollection())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('head_id');
            $table->date('payment_date');
            $table->float('amount');
            $table->string('remarks');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists((new PaymentCollection())->getTable());
    }
}
