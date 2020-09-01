<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFavoriteTableJobApplications extends Migration
{

    public function up()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->boolean('favorite')
                ->default(0)
                ->after('matching');
        });
    }


    public function down()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn('favorite');
        });
    }
}
