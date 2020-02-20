<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalAdminClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_admin_classifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->nullable();
            $table->string('description')->nullable();
            $table->string('area')->nullable();
            $table->string('leadership')->nullable();
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
        Schema::dropIfExists('internal_admin_classifications');
    }
}
