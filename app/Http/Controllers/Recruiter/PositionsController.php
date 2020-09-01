<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePosition;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function index()
    {
        return view('recruiter.positions.index', ['positions' => Position::all()]);
    }

    public function create()
    {
        return view('recruiter.positions.create');
    }

    public function store(StorePosition $request)
    {

            Position::create($request->all());
        return $this->success('Cadastro efetuado com sucesso !', route('positions'), [], false);

    }
    public function edit(Position $position, $id)
    {
        return view('recruiter.positions.edit', ['positions' => $position->find($id)]);
    }


    public function update(StorePosition $request, Position $position, $id)
    {
        $validated = $request->validated();

        if ($validated)
            $position->find($id)->update($request->all());
        return $this->success('Cadastro editado com sucesso !', route('positions'), [], false);

    }

    public function delete(Position $position, $id)
    {

        $position->find($id)->delete();

        return $this->success('Cadastro deleteado com sucesso !', route('positions'), [], false);
    }
}
