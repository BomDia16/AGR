<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id_sender');
            $table->foreignId('admin_id_reciever');
            $table->foreignId('record_id');
            $table->boolean('approved')->default(false);
            $table->timestamps();

            // Foreign's Key
            $table->foreign('record_id')->references('id')->on('records');
            $table->foreign('user_id_sender')->references('id')->on('users');
            $table->foreign('admin_id_reciever')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
