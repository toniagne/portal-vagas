<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('career_id')->nullable();
            $table->unsignedBigInteger('job_regime_id')->nullable();
            $table->unsignedBigInteger('proficiency_id')->nullable();
            $table->unsignedBigInteger('specialization_id')->nullable();
            $table->string('name', 100);
            $table->string('email', 50)->unique();
            $table->string('password', 500);
            $table->string('phone', 15)->nullable();
            $table->string('avatar', 45)->nullable();
            $table->date('born_date')->nullable();
            $table->tinyInteger('email_verified')->default(0);
            $table->dateTime('email_verified_at')->nullable();
            $table->integer('profile_strength')->nullable();
            $table->tinyInteger('profile_completed')->nullable();
            $table->string('personal_summary', 500)->nullable();
            $table->enum('english_proficiency', ['B', 'I', 'A'])->nullable();
            $table->string('address_street', 45)->nullable();
            $table->string('address_number', 45)->nullable();
            $table->string('address_neighborhood', 45)->nullable();
            $table->string('address_complement', 45)->nullable();
            $table->tinyInteger('deficient')->nullable();
            $table->tinyInteger('active')->nullable();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
            $table->foreign('job_regime_id')->references('id')->on('job_regimes')->onDelete('cascade');
            $table->foreign('proficiency_id')->references('id')->on('proficiencies')->onDelete('cascade');
            $table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('cascade');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
