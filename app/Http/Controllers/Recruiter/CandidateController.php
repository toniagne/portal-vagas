<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;


class CandidateController extends Controller
{
   public function index(){
       $candidates = Candidate::all();
       return view('recruiter.candidates.index', compact('candidates'));
   }

   public function show($id){
       $candidate = Candidate::find($id);
       return view('recruiter.candidates.show', compact('candidate'));
   }
}
