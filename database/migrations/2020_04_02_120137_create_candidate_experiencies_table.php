<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateExperienciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('candidate_id');
            $table->string('company_name', 45);
            $table->enum('company_type', ['P', 'G', 'M', 'S']);
            $table->string('activity_resume', 500);
            $table->date('period_start');
            $table->date('period_end');
            $table->time('expedient_start');
            $table->time('expedient_end');
            $table->tinyInteger('current_job');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_experiences');
    }
}
