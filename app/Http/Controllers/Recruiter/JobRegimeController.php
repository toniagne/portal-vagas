<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\JobRegime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\History;
use App\Http\Requests\StoreJobRegime;
use View;

class JobRegimeController extends Controller
{

    public function __construct()
    {

        $this->bradcrumb = ['title' => 'Regime de contratações', 'icon' => 'icon-feather-file-text'];
    }

    public function index()
    {
        return view('recruiter.job-regime.index', ['jobRegimes' => JobRegime::all()]);
    }

    public function create()
    {
        return view('recruiter.job-regime.create');
    }

    public function store(StoreJobRegime $request)
    {
        $validated = $request->validated();

        if ($validated)
            JobRegime::create($request->all());
            return $this->success('Cadastro editado com sucesso !', route('job-regime'), [], false);

    }

    public function edit(JobRegime $jobRegimes, $id)
    {
        return view('recruiter.job-regime.edit', ['jobRegimes' => $jobRegimes->find($id)]);
    }


    public function update(StoreJobRegime $request, JobRegime $jobRegimes, $id)
    {

        $validated = $request->validated();

        if ($validated)
            $jobRegimes->find($id)->update($request->all());
            return $this->success('Cadastro editado com sucesso !', route('job-regime'), [], false);
    }

    public function delete(JobRegime $jobRegimes, $id)
    {

        $jobRegimes->find($id)->delete();

        return $this->success('Cadastro deleteado com sucesso !', route('job-regime'), [], false);
    }
}
