<x-layout title="Manutenções">
    <a href="{{ route('veiculos.create') }}" class="btn btn-dark mb-2">Adicionar um novo veículo</a>
    
    
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset
    
    <ul class="list-group">
        @foreach ($manutencoes as $manutencao)
        
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $manutencao->descricao }}</li> 
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $manutencao->tipo }}</li>
            
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $manutencao->modelo }} - {{$manutencao->fabricante}} - {{$manutencao->placa }}</li> 
           
            
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $manutencao->data }}</li> 
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('manutencoes.edit', $manutencao->id) }}" class="btn btn-primary btn-sm">
                    Editar 
                </a>
            
            
                <form action="{{ route('manutencoes.destroy', $manutencao->id ) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </li>
            
        @endforeach
        
    </ul>
</x-layout>