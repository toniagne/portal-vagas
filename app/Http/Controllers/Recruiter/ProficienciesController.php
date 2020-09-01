<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Proficiency;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProficiency;
use View;

class ProficienciesController extends Controller
{


    public function index()
    {
        return view('recruiter.proficiencie.index', ['proficiencies' => Proficiency::all()]);
    }

    public function create()
    {
        return view('recruiter.proficiencie.create');
    }

    public function store(StoreProficiency $request)
    {

        $validated = $request->validated();

        if ($validated)
            Proficiency::create($request->all());
            return $this->success('Cadastro efetuado com sucesso !', route('proficiencie'), [], false);

    }
    public function edit(Proficiency $proficiencie, $id)
    {
        return view('recruiter.proficiencie.edit', ['proficiencies' => $proficiencie->find($id)]);
    }


    public function update(StoreProficiency $request, Proficiency $proficiencie, $id)
    {
        $validated = $request->validated();

        if ($validated)
            $proficiencie->find($id)->update($request->all());
            return $this->success('Cadastro editado com sucesso !', route('proficiencie'), [], false);

    }

    public function delete(Proficiency $proficiencie, $id)
    {

        $proficiencie->find($id)->delete();

        return $this->success('Cadastro deleteado com sucesso !', route('proficiencie'), [], false);
    }
}
