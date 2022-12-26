<x-layout title="Editar Veículo">
    <x-veiculos.form action="{{ route('veiculos.update', $veiculo->id) }}" id="{{$veiculo->id}}" placa="{{$veiculo->placa}}" fabricante="{{$veiculo->fabricante}}" modelo="{{$veiculo->modelo}}" ano="{{$veiculo->ano}}" />
</x-layout>