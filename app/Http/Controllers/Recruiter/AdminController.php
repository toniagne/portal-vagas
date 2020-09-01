<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $jobsOpenlyCount = Job::where('finished', 0 )->get()->count();
       return view ('recruiter.home.index', compact('jobsOpenlyCount'));
    }
}
