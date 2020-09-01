<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Candidate;
use App\Models\History;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobCategory;
use App\Models\JobRegime;
use App\Models\Proficiency;
use App\Models\Skill;
use App\Http\Requests\StoreJob;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use View;

class JobController extends Controller
{
    public function __construct()
    {
         $this->bradcrumb = ['title' => 'Vagas', 'icon' => 'icon-feather-briefcase'];
    }

    public function index()
    {
        return view('recruiter.job.index', ['jobs' => Job::all()]);
        Log::info('Showing user profile for user: ');
    }

    public function create()
    {
        $jobCategories   = JobCategory::where('active', 1)->orderBy('name')->get();
        $jobRegimes      = JobRegime::all();
        $specializations = Specialization::all();
        $proficiencies   = Proficiency::all();
        $skills          = Skill::all();
        $benefits         = Benefit::all();
        return view('recruiter.job.create', compact('jobCategories', 'jobRegimes', 'specializations', 'proficiencies', 'skills', 'benefits'));
    }

    public function store(StoreJob $request)
    {
        // ADICIONA OS CAMPOS PADRÃO
        $request->request->add([
            "finished"        => 0,
            "published"       => 0,
            "wage_start"      => Job::convertMonetary($request->wage_start),
            "wage_end"        => Job::convertMonetary($request->wage_end)
        ]);

        // CADASTRA A VAGA
        $job = Job::create($request->all());

        // LANÇA AS HABILIDADES
        $job->setSkills($request->skills);

        // LANÇA OS BENEFÍCIOS
        $job->setBenefits($request->benefits);

        // RETORNA MENSAGEM DE SUCESSO
        return $this->success('Vaga cadastrada com sucesso !', route('jobs'), [], false);
    }

    public function edit(Job $job, $id)
    {
        $jobCategories   = JobCategory::where('active', 1)->orderBy('name')->get();
        $jobRegimes      = JobRegime::all();
        $specializations = Specialization::all();
        $proficiencies   = Proficiency::all();
        $skills          = Skill::all();
        $benefits        = Benefit::all();
        $job             = $job->find($id);

        return view('recruiter.job.edit', compact('jobCategories', 'jobRegimes', 'specializations', 'proficiencies', 'skills', 'benefits', 'job'));
    }

    public function show(Job $job, $id)
    {
        return view('recruiter.job.show', ['job' => $job->find($id)]);
    }
    public function update(Request $request, $id)
    {

        // RETORNA O REGISTRO À SER ALTERADO
        $job = Job::find($id);

        // INSERE OS FORMS
        $job->update($request->all());

        // LANÇA AS HABILIDADES
        $job->setSkills($request->skills);

        // LANÇA OS BENEFÍCIOS
        $job->setBenefits($request->benefits);

        // RETORNA MENSAGEM DE SUCESSO
        return $this->success('Vaga ALTERADA com sucesso !', route('jobs'), [], false);
    }

    public function delete(Job $job, $id)
    {

        $job->find($id)->delete();
        return $this->success('Cadastro deleteado com sucesso !', route('jobs'), [], false);
    }

    public function publish($id)
    {
        // BUSCA O STATUS DA PUBLICAÇÃO
        $job = Job::find($id);

        // CONDICIONAL PARA STATUS DA VAGA
        $pub = $job->published == 0 ? 1 : 0;

        // ATUALIZA DE ACORDO COM A CONDIÇÃO
        $job->update(['published' => $pub]);

        // RETORNA A RESPOSTA
        return $this->success('Status da vaga alterada com sucesso !', route('jobs.show', $id), [], false);
    }

    public function finished($id)
    {
        // BUSCA O STATUS DA PUBLICAÇÃO
        $job = Job::find($id);

        // CONDICIONAL PARA STATUS DA VAGA
        $pub = $job->finished == 0 ? 1 : 0;

        // ATUALIZA DE ACORDO COM A CONDIÇÃO
        $job->update(['finished' => $pub]);

        // RETORNA A RESPOSTA
        return $this->success('Status da vaga alterada com sucesso !', route('jobs.show', $id), [], false);
    }

    public function favorite($id)
    {
        // BUSCA O STATUS DA PUBLICAÇÃO
        $jobApplication = JobApplication::find($id);

        // CONDICIONAL PARA STATUS DA VAGA
        $pub = $jobApplication->favorite == 0 ? 1 : 0;

        // ATUALIZA DE ACORDO COM A CONDIÇÃO
        $jobApplication->update(['favorite' => $pub]);

        // RETORNA A RESPOSTA
        return $this->success('Candidato favoritado com sucesso !', route('jobs.show', $jobApplication->job_id), [], false);
    }

    public function reject($id)
    {
        // BUSCA O STATUS DA PUBLICAÇÃO
        $jobApplication = JobApplication::find($id);

        // CONDICIONAL PARA STATUS DA VAGA
        $pub = $jobApplication->rejected == 0 ? 1 : 0;

        // ATUALIZA DE ACORDO COM A CONDIÇÃO
        $jobApplication->update(['rejected' => $pub]);

        // RETORNA A RESPOSTA
        return $this->success('Candidato rejeitado com sucesso !', route('jobs.show', $jobApplication->job_id), [], false);
    }
}
