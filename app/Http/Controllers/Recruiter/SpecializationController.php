<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecialization;
use App\Models\History;
use App\Models\Specialization;
use Illuminate\Http\Request;
use View;

class SpecializationController extends Controller
{

    public function __construct()
    {
        $this->bradcrumb = ['title' => 'Especializações', 'icon' => 'icon-feather-box'];
    }

    public function index()
    {
        return view('recruiter.specialization.index', ['specializations' => Specialization::all()]);
    }

    public function create()
    {
        return view('recruiter.specialization.create');
    }


    public function store(StoreSpecialization $request)
    {

        $validated = $request->validated();


        if ($validated){
            Specialization::create($request->all());
            return  $this->success('Cadastro efetuado com sucesso !', route('specialization'), [], false);
        }  else {

            return  $this->error('Erro', route('specialization'), [], false);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit(Specialization $specialization, $id)
    {
        return view('recruiter.specialization.edit', ['specializations' => $specialization->find($id)]);
    }


    public function update(Request $request, Specialization $specialization, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $specialization->find($id)->update($request->all());

        return  $this->success('Cadastro alterado com sucesso !', route('specialization'), [], false);
    }

    public function delete(Specialization $specialization, $id)
    {

        $specialization->find($id)->delete();

        return  $this->success('Cadastro apagado com sucesso !', route('specialization'), [], false);
    }
}
