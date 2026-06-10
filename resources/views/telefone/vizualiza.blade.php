@extends('leiaute')

@section('titulo')
    Visualizar aluno
    <a class="btn btn-light" href="{{ route('aluno.index') }}">Voltar</a>
@endsection

@section('conteudo')

    {{-- Formulário de edição do aluno --}}
    <form method="POST" action="{{ route('aluno.update', $aluno->id) }}">
        @csrf
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $aluno->nome }}">
        </div>
        <div class="mb-3">
            <label>Endereço</label>
            <input type="text" name="endereco" class="form-control" value="{{ $aluno->endereco }}">
        </div>
        <div class="mb-3">
            <label>Matrícula</label>
            <input type="text" name="matricula" class="form-control" value="{{ $aluno->matricula }}">
        </div>
        <button type="submit" class="btn btn-primary mb-4">Atualiza aluno</button>
    </form>

    <hr>

    {{-- Telefones --}}
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="mb-0">Telefones</h5>
        <a class="btn btn-light btn-sm" href="{{ route('telefone.create', ['aluno_id' => $aluno->id]) }}">
            + Adicionar telefone
        </a>
    </div>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Número</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($aluno->telefone as $tel)
                <tr>
                    <td>{{ $tel->descricao }}</td>
                    <td>{{ $tel->numero }}</td>
                    <td style="white-space: nowrap;">
                        <a class="btn btn-sm btn-secondary" href="{{ route('telefone.view', $tel->id) }}">Editar</a>
                        <a class="btn btn-sm btn-danger btn-excluir-tel" href="{{ route('telefone.destroy', $tel->id) }}">Excluir</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Nenhum telefone cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>

@endsection

@section('script')
    <script>
        document.querySelectorAll('.btn-excluir-tel').forEach(function (botao) {
            botao.addEventListener('click', function (event) {
                if (!confirm('Excluir este telefone?')) event.preventDefault();
            });
        });
    </script>
@endsection