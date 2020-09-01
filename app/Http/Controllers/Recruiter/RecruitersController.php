<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecruiter;
use App\Models\Recruiter;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;


class RecruitersController extends Controller
{


    public function index()
    {

        $positions   = Position::all();
        $recruiters  = Recruiter::all();

        return view('recruiter.recruiter.index', compact('positions', 'recruiters'));
    }

    public function create()
    {
        $positions   = Position::all();
        return view('recruiter.recruiter.create', compact('positions'));
    }

    public function store(Request $request, Recruiter $recruiter)
    {
        // GERA UMA SENHA ALEATÓRIA COM ATÉ 8 DÍGITOS
        $request->request->add(['password' => $recruiter->getPassword(8)]);

        // CADASTRA O RECRUTADOR
        $recruiter->create($request->all());

        // GATILHO DA MENSAGEM DE SUCESSO
        return $this->success('Cadastro efetuado com sucesso !', route('recruiter'), [], false);

    }
    public function edit(User $recruiters, $id)
    {
        $positions   = Position::all();
        $recruiter   = $recruiters->find($id);
        return view('recruiter.recruiter.edit', compact('positions', 'recruiter'));
    }

    public function show(Recruiter $recruiters, $id)
    {
        $recruiter   = $recruiters->find($id);
        return view('recruiter.recruiter.show', compact('recruiter'));

    }

    public function update(Request $request, User $recruiters, $id)
    {

        $recruiters->find($id)->update($request->all());
        return $this->success('Cadastro editado com sucesso !', route('recruiter'), [], false);

    }

    public function delete(User $recruiters, $id)
    {

        $recruiters->find($id)->delete();
        return $this->success('Cadastro deleteado com sucesso !', route('recruiter'), [], false);
    }

    public function passowrdResend(Recruiter $recruiters, $id){
        $recruiter = $recruiters->find($id);

        $recruiter->save([
            'password' => $recruiter->getPassword(8)
        ]);

        return $this->success('Senha enviada com sucesso !', false, [], false);
    }

    public function status(Recruiter $recruiters, $id){
        $recruiter = $recruiters->find($id);

        if ($recruiter->active = 1){ $status = 0; } else { $status = 1; }

        $recruiter->update([
            'active' => $status
        ]);

        return $this->success('Status foi modificado com sucesso !', route('recruiter.show', $recruiter->id) , [], false);

    }
}
