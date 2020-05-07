<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image');
            $table->string('customer_name');
            $table->dateTime('date')->date();
            $table->tinyInteger('gender');
            $table->string('address');
            $table->integer('phone')->default(50);
            $table->string('email');
            $table->timestamps();
            $table->bigInteger('member_id')->unsigned();
            $table->bigInteger('project_id')->unsigned();
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
}
