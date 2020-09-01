<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRejectedTableJobApplications extends Migration
{
    public function up()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->boolean('rejected')
                ->default(0)
                ->after('favorite');
        });
    }


    public function down()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn('rejected');
        });
    }
}
