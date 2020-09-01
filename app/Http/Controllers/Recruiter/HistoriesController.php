<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use View;

class HistoriesController extends Controller
{
    public function __construct()
    {
        // GERA UMA MIGALHA PARA USAR EM TODAS AS VEIWS
        $this->bradcrumb = ['title' => 'Logs de acesso', 'icon' => 'icon-feather-clock'];
    }

    public function index(){
        return view('recruiter.histories.index',['histories' => History::all()]);
    }
}
