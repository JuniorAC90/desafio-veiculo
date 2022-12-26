<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VeiculosController extends Controller
{
    public function index(Request $request)
    {
        $veiculos = Veiculo::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        
        return view('veiculos.index')->with('veiculos', $veiculos)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        $veiculos = Veiculo::query()->orderBy('modelo')->get();
        return view('veiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => ['required'],
            'fabricante' => ['required'],
            'modelo' => ['required'],
            'ano' => ['required']
        ]);


        $idUsuario = Auth::id();
        $placa = $request->input('placa');
        $fabricante = $request->input('fabricante');
        $modelo = $request->input('modelo');
        $ano = $request->input('ano');

        $veiculo = new Veiculo();
        $veiculo->placa = $placa;
        $veiculo->fabricante = $fabricante;
        $veiculo->modelo = $modelo;
        $veiculo->ano = $ano;
        $veiculo->idUsuario = $idUsuario;

        $veiculo->save();
        $request->session()->flash('mensagem.sucesso', 'Veículo adicionado com sucesso');

        return to_route('veiculos.index');
    }

    public function destroy(Request $request)
    {
        
        Veiculo::destroy($request->veiculo);
        $request->session()->flash('mensagem.sucesso', 'Veículo removido com sucesso');

        return to_route('veiculos.index');
    }

    public function edit(Veiculo $veiculo)
    {
        return view('veiculos.edit')->with('veiculo', $veiculo);
    }

    public function update(Veiculo $veiculo, Request $request)
    {
        $request->validate([
            'placa' => ['required'],
            'fabricante' => ['required'],
            'modelo' => ['required'],
            'ano' => ['required']
        ]);

        $placa = $request->input('placa');
        $fabricante = $request->input('fabricante');
        $modelo = $request->input('modelo');
        $ano = $request->input('ano');
        
        if ($veiculo->placa != $placa) $veiculo->placa = $placa;
        if ($veiculo->fabricante != $fabricante) $veiculo->fabricante = $fabricante;
        if ($veiculo->modelo != $modelo) $veiculo->modelo = $modelo;
        if ($veiculo->ano != $ano) $veiculo->ano = $ano;
        
        $veiculo->save();
        $request->session()->flash('mensagem.sucesso', 'Veículo editado com sucesso');
        return to_route('veiculos.index');

    }
}
