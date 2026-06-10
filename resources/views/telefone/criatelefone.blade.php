@extends('leiaute')

@section('titulo')
    Cria novo telefone<br>
    <a class="btn btn-dark" href="{{ route('telefone.index') }}">Voltar</a>
@endsection

@section('conteudo')
    <form action="{{ route('telefone.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idaluno" class="form-label">id Aluno</label>
            <input type="number" class="form-control" id="idaluno" name="idaluno" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" required>
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="number" class="form-control" id="numero" name="numero" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Telefone</button>
    </form>
@endsection