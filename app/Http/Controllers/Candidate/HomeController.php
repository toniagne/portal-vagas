<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
   public function index(Request $request){
       return view('candidate.home.index', [
           'categories' => JobCategory::isActive()->get(),
           'jobs'       => Job::notFinished()->hasPublished()->get(),
       ]);
   }

    public function jobs(){
        return view('candidate.jobs.index');
    }
}
