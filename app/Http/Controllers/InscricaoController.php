<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Inscricao;
use App\Models\Usuario;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{

    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'requirid|exists:usuario,id',
            'usuario_id' => 'requirid|exists:usuario,id',
        ]);

        $usuarioId = $request->input('usuario_id');
        $eventoId = $request->input('evento_id');

        $evento = Evento::findOrFail($eventoId);

        if ($evento->status !== 'aberto') {
            return redirect()->back()->withErrors(['error' => 'Não é possível se inscrever. Evento' . $evento->status . '.']);
        }

        $inscricaoExiste = Inscricao::where('usuario_id', $usuarioId)
                            ->where('evento_id', $eventoId)
                            ->exists();
        if($inscricaoExiste){
            return redirect()->back()->withErrors([
                'error' => 'Você já está inscrito neste evento!'
            ]);
        }
        Inscricao::create([
            'usuario_id' =>$usuarioId,
            'evento_id' => $eventoId,
        ]);

        return redirect()->back()->with('sucess', 'Inscrição realizada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscricao $inscricao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscricao $inscricao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscricao $inscricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscricao $inscricao)
    {
        //
    }
}
