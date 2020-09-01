<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Traits\JobsHelper;

class JobsController extends Controller
{
    use JobsHelper;

    public function jobs(){
        return view('candidate.jobs');
    }

    public function apply($id)
    {
        $job  = Job::findOrFail($id);
        $user = Auth::guard('candidate')->user();

        $matching = $this->getMatchingJobUser($job, $user);

        return $this->success('Vaga Candidatada com sucesso.');
    }
}
