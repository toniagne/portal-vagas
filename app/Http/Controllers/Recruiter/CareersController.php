<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarrer;
use App\Models\Career;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function index()
    {
        // VIEW INDEX
        return view('recruiter.careers.index', ['careers' => Career::all()]);

    }

    public function create()
    {
        // VIEW CREATE
        return view('recruiter.careers.create');
    }

    public function store(StoreCarrer $request)
    {
        $validated = $request->validated();

        if ($validated)
            // REGISTRA NO BD
            Career::create($request->all());
            return  $this->success('Cadastro efetuado com sucesso !', route('careers'), [], false);

    }

    public function edit(Career $career, $id)
    {
        // VIEW EDITAR
        return view('recruiter.careers.edit', ['careers' => $career->find($id)]);
    }

    public function update(StoreCarrer $request, Career $career, $id)
    {

        $validated = $request->validated();

        if ($validated)
            // FAZ A ATUALIZAÇÃO NO BD
            $career->find($id)->update($request->all());

        // REDIRECIONA PARA A INDEX
        return $this->success('Cadastro alterado com sucesso !', route('careers'), [], false);
    }

    public function delete(Career $career, $id)
    {
        // DELETA ITEM DO BD
        $career->find($id)->delete();
        return $this->success('Cadastro deleteado com sucesso !', route('careers'), [], false);
   }
}
