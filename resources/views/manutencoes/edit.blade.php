<x-layout title="Editar Manutenção">
    <x-manutencoes.form action="{{ route('manutencoes.update', $manutencao->id) }}" id="{{$manutencao->id}}" descricao="{{$manutencao->descricao}}" tipo="{{$manutencao->tipo}}" placa="{{$manutencao->placa}}" />
</x-layout>