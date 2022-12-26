<x-layout title="Veículos">
    <a href="{{ route('veiculos.create') }}" class="btn btn-dark mb-2">Adicionar um novo veículo</a>
    
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset
    
    <ul class="list-group">
        @foreach ($veiculos as $veiculo)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $veiculo->placa }}</li> 
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $veiculo->fabricante }}</li> 
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $veiculo->modelo }}</li> 
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $veiculo->ano }}</li> 
            
            
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <form action="{{ route('manutencoes.create') }}" >
                    @csrf
                    <input type="hidden" id="idVeiculo" name="idVeiculo" value="{{$veiculo->id}}">
                    <button class="btn btn-primary btn-sm ">Adicionar Manutenção</button>
                </form>
                <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="btn btn-primary btn-sm">
                    Editar 
                </a>
                <form action="{{ route('veiculos.destroy', $veiculo->id ) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm ">Excluir</button>
                </form>
            </li> 
            
            
        @endforeach
        
    </ul>
</x-layout>