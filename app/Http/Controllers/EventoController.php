<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Event;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('evento.index', compact($eventos));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('evento.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'local' => 'required|string|max:255',
            'status' => 'required|in:aberto,em_andamento|fechado|encerrado',
            'date' => 'required|date',
        ]);
        Evento::create($request->all());

        return redirect()->route('evento.index')->with('success', 'Evento Cadastrado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evento = Evento::findOrFail($id);
        return view('evento.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evento = Evento::findOrFail($id);
        return view('evento.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evento = Evento::findOrFail($id);
        $request->validate([
           'nome' => 'required|string|max:255',
            'local' => 'required|string|max:255',
            'status' => 'required|in:aberto,em_andamento|fechado|encerrado',
            'date' => 'required|date',
        ]);

        $evento->update($request->all());
        return redirect()->route('evento.index')->with('sucess', 'Evento Atualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();
        return redirect()->route('evento.index')->with('Evento Apagado!');
    }
}
