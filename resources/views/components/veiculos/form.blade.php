
    <form action="{{ $action }}" method="post">
        @csrf
        @isset($id)
        @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="placa" class="form-label">Placa:</label>
            <input type="text" id="placa" name="placa" class="form-control" @isset($placa)value="{{ $placa }}" @endisset>
            <label for="fabricante" class="form-label">Fabricante:</label>
            <input type="text" id="fabricante" name="fabricante" class="form-control" @isset($fabricante)value="{{ $fabricante }}" @endisset>
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" id="modelo" name="modelo" class="form-control" @isset($modelo)value="{{ $modelo }}" @endisset>
            <label for="ano" class="form-label">Ano:</label>
            <input type="number" id="ano" name="ano" class="form-control" @isset($ano)value="{{ $ano }}" @endisset>
            
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
        
    </form>
