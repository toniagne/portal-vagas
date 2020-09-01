<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBenefit;
use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitsController extends Controller
{
    public function index()
    {
        return view('recruiter.benefit.index', ['benefits' => Benefit::all()]);
    }

    public function create()
    {
        return view('recruiter.benefit.create');
    }

    public function store(StoreBenefit $request)
    {

        $validated = $request->validated();

        if ($validated)
            Benefit::create($request->all());
        return $this->success('Cadastro efetuado com sucesso !', route('benefits'), [], false);

    }
    public function edit(Benefit $benefit, $id)
    {
        return view('recruiter.benefit.edit', ['benefit' => $benefit->find($id)]);
    }


    public function update(StoreBenefit $request, Benefit $benefit, $id)
    {
        $validated = $request->validated();

        if ($validated)
            $benefit->find($id)->update($request->all());
        return $this->success('Cadastro editado com sucesso !', route('benefits'), [], false);

    }

    public function delete(Benefit $benefit, $id)
    {

        $benefit->find($id)->delete();

        return $this->success('Cadastro deleteado com sucesso !', route('benefits'), [], false);
    }
}
