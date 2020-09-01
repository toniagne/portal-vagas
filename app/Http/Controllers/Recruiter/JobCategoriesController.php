<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
use App\Http\Requests\StoreJobCategory;
use View;


class JobCategoriesController extends Controller
{


    public function index()
    {
      // VIEW INDEX
      return view('recruiter.job-categories.index', ['jobCategories' => JobCategory::all()]);

    }

    public function create()
    {
        // VIEW CREATE
        return view('recruiter.job-categories.create');
    }

    public function store(StoreJobCategory $request)
    {
        $validated = $request->validated();

        if ($validated)
            // REGISTRA NO BD
            JobCategory::create($request->all());
            return  $this->success('Cadastro efetuado com sucesso !', route('job-categories'), [], false);

    }

    public function edit(JobCategory $jobCategory, $id)
    {
        // VIEW EDITAR
        return view('recruiter.job-categories.edit', ['jobCategory' => $jobCategory->find($id)]);
    }

    public function update(StoreJobCategory $request, JobCategory $jobCategory, $id)
    {

        $validated = $request->validated();

        if ($validated)
            // FAZ A ATUALIZAÇÃO NO BD
            $jobCategory->find($id)->update($request->all());

            // REDIRECIONA PARA A INDEX
            return $this->success('Cadastro alterado com sucesso !', route('job-categories'), [], false);
    }

    public function delete(JobCategory $jobCategory, $id)
    {
        // DELETA ITEM DO BD

        $jobCategory->find($id);

        if ($jobCategory->first()->active == 1)
            $jobCategory->update(['active' => 0]);
        else
            $jobCategory->update(['active' => 1]);


        // REDIRECIONA PARA O INDEX
        return $this->success('Cadastro desativado com sucesso !', route('job-categories'), [], false);
    }
}
