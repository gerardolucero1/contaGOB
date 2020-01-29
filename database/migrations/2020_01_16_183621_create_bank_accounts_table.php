<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('institution')->nullable();
            $table->string('accountnumber')->nullable();
            $table->string('accountingaccount')->nullable();
            $table->boolean('issuecheck')->nullable();
            $table->boolean('enable')->nullable();
            $table->string('fundingsource')->nullable();
            $table->integer('type_id')->unsigned();
            $table->integer('plan_id')->unsigned();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('account_types');

            $table->foreign('plan_id')->references('id')->on('account_plan_c_o_n_a_c_s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
}
