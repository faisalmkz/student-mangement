<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->char('gender', 8);
            $table->unsignedBigInteger('reporting_to')->nullable();
            $table->foreign('reporting_to')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('standard_id')->nullable();
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('set null');
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
        Schema::dropIfExists('students');
    }
}
