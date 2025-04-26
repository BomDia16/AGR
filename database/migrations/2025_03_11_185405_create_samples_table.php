<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id');
            $table->integer('serial_number');
            $table->string('height_of_cylinder_head');
            $table->string('parallelism_between_top_and_bottom_face');
            $table->string('flatness_of_the_fire_face_logitudinal');
            $table->string('flatness_of_the_fire_face_150mm');
            $table->string('roughness_of_the_fire_face');
            $table->string('height_of_the_intake_valve_to_cylinder_head_face');
            $table->string('height_of_the_exhaust_valve_to_cylinder_head_face');
            $table->string('angle_of_the_intake_seat');
            $table->string('angle_of_the_exhaust_seat');
            $table->string('intake_valve_guides_height');
            $table->string('exhaust_valve_guides_height');
            $table->string('width_of_the_intake_valve_seat');
            $table->string('width_of_the_exhaust_valve_seat');
            $table->string('distance_between_intake_surface_and_exhaust_surface');
            $table->string('diameter_of_the_camshaft_housing');
            $table->string('leak_test');
            $table->string('vacuum_test');
            $table->timestamps();

            // Foreign's Key
            $table->foreign('record_id')->references('id')->on('records');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samples');
    }
}
