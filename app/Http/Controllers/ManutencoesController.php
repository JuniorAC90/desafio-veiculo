<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManutencoesController extends Controller
{
    public function index(Request $request)
    {
        
        //$manutencoes = Manutencao::all();
        //$manutencoes = Manutencao::query()->where('idVeiculo',$idVeiculo)->orderBy('descricao')->get();
        $idVeiculo = $request->idVeiculo;
        //$manutencoes = Manutencao::where('idVeiculo', $idVeiculo)->get();
        $manutencoes = DB::table('manutencoes')->join('veiculos', 'veiculos.id','=','idVeiculo')->where('idUsuario','=', Auth::id())->get();
        $veiculo = DB::table('veiculos')->where('id', '=', $idVeiculo)->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        
        return view('manutencoes.index')->with('manutencoes', $manutencoes)->with('veiculo', $veiculo)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(Request $request)
    {
        $idVeiculo = $request->input('idVeiculo');
        
        return view('manutencoes.create')->with('idVeiculo', $idVeiculo);
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => ['required'],
            'tipo' => ['required']
        ]);
        //descricao,tipo e placa
        $descricaoManutencao = $request->input('descricao');
        $tipoManutencao = $request->input('tipo');
        $idVeiculo = $request->input('idVeiculo');

        $manutencao = new Manutencao();
        $manutencao->descricao = $descricaoManutencao;
        $manutencao->tipo = $tipoManutencao;
        $manutencao->idVeiculo = $idVeiculo;
        $manutencao->data = date("Y-m-d");

        $manutencao->save();
        $request->session()->flash('mensagem.sucesso', 'Manutenção adicionada com sucesso');

        return to_route('manutencoes.index', ['idVeiculo' => $idVeiculo]);
    }

    public function destroy(Request $request)
    {
        
        Manutencao::destroy($request->manutenco);
        $request->session()->flash('mensagem.sucesso', 'Manutenção removida com sucesso');

        return to_route('manutencoes.index');
    }

    public function edit(Manutencao $manutenco)
    {
        return view('manutencoes.edit')->with('manutencao', $manutenco);
    }

    public function update(Manutencao $manutenco, Request $request)
    {
        $request->validate([
            'descricao' => ['required'],
            'tipo' => ['required']
            
        ]);

        $descricaoManutencao = $request->input('descricao');
        $tipoManutencao = $request->input('tipo');
        
        
        if ($manutenco->descricao != $descricaoManutencao) $manutenco->descricao = $descricaoManutencao;
        if ($manutenco->tipo != $tipoManutencao) $manutenco->tipo = $tipoManutencao;
        
        
        $manutenco->save();
        $request->session()->flash('mensagem.sucesso', 'Manutenção editada com sucesso');
        return to_route('manutencoes.index');

    }
}
