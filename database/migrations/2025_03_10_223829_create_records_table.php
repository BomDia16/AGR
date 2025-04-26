<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('report_number');
            $table->foreignId('user_id');
            $table->string('general_visual_of_pack');
            $table->string('pankage_in_vci');
            $table->string('oil_protected');
            $table->string('general_visual_of_part');
            $table->string('oxidations');
            $table->string('threads_clear_and_free');
            $table->string('beats_on_part');
            $table->string('deburr');
            $table->string('comments');
            $table->timestamps();

            // Foreign's Key
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
