@extends('leiaute')

@section('titulo')
    Criar Empréstimo<br>
    <a class="btn btn-dark" href="{{ route('emprestimo.index') }}">Voltar</a>
@endsection

@section('conteudo')
    <form action="{{ route('emprestimo.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Aluno</label>
            <select name="aluno_id" class="form-select">
                <option value=""> Selecione um aluno </option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Livro</label>
            <select name="livro_id" class="form-select">
                <option value="">Selecione um livro</option>
                @foreach($livros as $livro)
                    <option value="{{ $livro->id }}"> Livro : {{ $livro->nome }} Autor : {{ $livro->autor }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar empréstimo</button>
    </form>
@endsection