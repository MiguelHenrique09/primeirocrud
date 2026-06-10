@extends('leiaute')

@section('titulo')
    Visualizar livro<br>
    <a class="btn btn-dark" href="{{ route('livro.index') }}">Voltar</a>
@endsection

@section('conteudo')
    <form action="{{ route('livro.update', ['id' => $livro->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nomelivro class="form-label">Nome do livro</label>
            <input type="text" class="form-control" id="nomelivro"name="nomelivro" value="{{ old('nomelivro', $livro->nome) }}" required>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor', $livro->autor) }}" required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $livro->isbn) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualiza livro</button>
    </form>
@endsection