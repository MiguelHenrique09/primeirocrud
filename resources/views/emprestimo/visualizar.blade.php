@extends('leiaute')

@section('titulo')
    Visualizar emprestimo<br>
    <a class="btn btn-dark" href="{{ route('emprestimo.index') }}">Voltar</a>
@endsection

@section('conteudo')
    <form action="{{ route('emprestimo.devolver', ['id' => $emprestimo->id]) }}" method="POST">
        @csrf
            <label for="nome" class="form-label">Deseja concluir essa devolução ? </label>
           
    <a class="btn btn-primary" href="{{ route('emprestimo.index') }}">Manter emprestimo</a>
        <button type="submit" class="btn btn-primary">Devolver emprestimo</button>
    </form>
@endsection