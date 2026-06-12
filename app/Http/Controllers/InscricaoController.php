<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Inscricao;
use App\Models\Usuario;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{

    public function index()
    {
        $inscricoes = Inscricao::with(['usuario', 'evento'])->get();
        return view('inscricoes.index', compact('inscricoes'));
    }

    public function store(Request $request)
    {

        $cpf = $request->input('cpf');
        $eventoId = $request->input('evento_id');
        $usuario = Usuario::where('cpf', $cpf)->first();
        if (!$usuario) {
            return redirect()->back()->withErrors([
                'error' => 'Não foi possível realizar a inscrição. O CPF informado não está cadastrado no sistema.'
            ]);
        }
        $evento = Evento::findOrFail($eventoId);
        Inscricao::create([
            'usuario_id' => $usuario->id,
            'evento_id' => $eventoId,
        ]);
        return redirect()->back()->with('success', 'Inscrição realizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $inscricao = Inscricao::findOrFail($id);
        $inscricao->delete();
        return redirect()->back()->with('success', 'Inscrição cancelada e removida com sucesso!');
    }
}
