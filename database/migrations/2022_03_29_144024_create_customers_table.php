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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->integer('cg_id');
            $table->string('customer_name',50);
            $table->string('customer_phone',20)->unique();
            $table->string('customer_email',40)->nullable();
            $table->string('customer_company',100)->nullable();
            $table->string('customer_address',200)->nullable();
            $table->string('customer_city',100)->nullable();
            $table->string('customer_state',100)->nullable();
            $table->string('customer_postal',10)->nullable();
            $table->string('customer_country',100)->nullable();
            $table->text('customer_remarks')->nullable();
            $table->integer('customer_creator')->nullable();
            $table->integer('customer_editor')->nullable();
            $table->string('customer_slug');
            $table->integer('customer_status')->default(1);
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
        Schema::dropIfExists('customers');
    }
};
