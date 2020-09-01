<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialNetwork;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;

class SocialNetworkController extends Controller
{
    public function index()
    {
        return view('recruiter.social-networks.index', ['socialNetworks' => SocialNetwork::all()]);
    }

    public function create()
    {
        return view('recruiter.social-networks.create');
    }

    public function store(StoreSocialNetwork $request)
    {

        $validated = $request->validated();

        if ($validated)
            SocialNetwork::create($request->all());
        return $this->success('Cadastro efetuado com sucesso !', route('social.networks'), [], false);

    }
    public function edit(SocialNetwork $socialNetwork, $id)
    {
        return view('recruiter.social-networks.edit', ['socialNetworks' => $socialNetwork->find($id)]);
    }


    public function update(StoreSocialNetwork $request, SocialNetwork $socialNetwork, $id)
    {
        $validated = $request->validated();

        if ($validated)
            $socialNetwork->find($id)->update($request->all());
        return $this->success('Cadastro editado com sucesso !', route('social.networks'), [], false);

    }

    public function delete(SocialNetwork $socialNetwork, $id)
    {
        $socialNetwork->find($id)->delete();
        return $this->success('Cadastro deleteado com sucesso !', route('social.networks'), [], false);
    }

    public function show(SocialNetwork $socialNetwork, $id)
    {
        $skills   = $socialNetwork->find($id);
        return view('social.networks.show', compact('skills'));

    }
}
