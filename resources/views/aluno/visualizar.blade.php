@extends('leiaute')

@section('titulo')
    Visualizar aluno<br>
    <a class="btn btn-dark" href="{{ route('aluno.index') }}">Voltar</a>
@endsection

@section('conteudo')
    <form action="{{ route('aluno.update', ['id' => $aluno->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $aluno->nome) }}" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco', $aluno->endereco) }}" required>
        </div>
        <div class="mb-3">
            <label for="matricula" class="form-label">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" value="{{ old('matricula', $aluno->matricula) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualiza aluno</button>
    </form>
@endsection