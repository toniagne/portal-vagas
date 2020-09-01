<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_category_id');
            $table->unsignedBigInteger('job_regime_id');
            $table->unsignedBigInteger('proficiency_id');
            $table->unsignedBigInteger('specialization_id');
            $table->string('title', 100);
            $table->string('primary_activities', 5000);
            $table->string('mandatory_requirements', 5000);
            $table->string('differential_knowledges', 5000);
            $table->decimal('wage_start', 15, 2)->nullable();
            $table->decimal('wage_end', 15, 2)->nullable();
            $table->tinyInteger('wage_negociation');
            $table->tinyInteger('published');
            $table->tinyInteger('finished');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('job_regime_id')->references('id')->on('job_regimes')->onDelete('cascade');
            $table->foreign('proficiency_id')->references('id')->on('proficiencies')->onDelete('cascade');
            $table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
