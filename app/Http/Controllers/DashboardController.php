<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Inscricao;
use App\Models\Usuario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $eventos = Evento::where('status', 'aberto')->get();
        $inscricoes = Inscricao::all();
        return view('index', compact('eventos', 'inscricoes'));
    }
}
