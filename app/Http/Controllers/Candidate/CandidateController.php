<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateStoreRequest;
use App\Models\Candidate;
use App\Models\Career;
use App\Models\City;
use App\Models\JobRegime;
use App\Models\Proficiency;
use App\Models\Skill;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('candidate.dashboard.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(Request $request)
    {
        return view('candidate.profile.index', [
            'careers' => Career::all(),
            'cities' => City::all(),
            'skills' => Skill::all(),
            'proficiencies' => Proficiency::all(),
            'regimes' => JobRegime::all(),
            'specializations' => Specialization::all(),
        ]);
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        dd($request->all());
    }
}
