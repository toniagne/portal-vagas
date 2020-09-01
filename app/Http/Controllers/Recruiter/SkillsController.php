<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\StoreSkill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{

    public function index()
    {
        return view('recruiter.skills.index', ['skills' => Skill::all()]);
    }

    public function create()
    {
        return view('recruiter.skills.create');
    }

    public function store(StoreSkill $request)
    {

        $validated = $request->validated();

        if ($validated)
            Skill::create($request->all());
        return $this->success('Cadastro efetuado com sucesso !', route('skill'), [], false);

    }
    public function edit(Skill $skill, $id)
    {
        return view('recruiter.skills.edit', ['skills' => $skill->find($id)]);
    }


    public function update(StoreSkill $request, Skill $skill, $id)
    {
        $validated = $request->validated();

        if ($validated)
            $skill->find($id)->update($request->all());
        return $this->success('Cadastro editado com sucesso !', route('skill'), [], false);

    }

    public function delete(Skill $skill, $id)
    {
        $skill->find($id)->delete();
        return $this->success('Cadastro deleteado com sucesso !', route('skill'), [], false);
    }

    public function show(Skill $skill, $id)
    {
        $skills   = $skill->find($id);
        return view('recruiter.skills.show', compact('skills'));

    }
}
