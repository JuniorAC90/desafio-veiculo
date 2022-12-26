
    <form action="{{ $action }}" method="post">
        @csrf
        @isset($id)
        @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <input type="text" id="descricao" name="descricao" class="form-control" @isset($descricao)value="{{ $descricao }}" @endisset>
            <label for="tipo" class="form-label">Tipo:</label>
            <input type="text" id="tipo" name="tipo" class="form-control" @isset($tipo)value="{{ $tipo }}" @endisset>
            <input type="hidden" id="idVeiculo" name="idVeiculo" class="form-control" @isset($idVeiculo) value="{{ $idVeiculo }}" @endisset>
            
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
        
    </form>
