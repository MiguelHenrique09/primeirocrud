@extends('leiaute')

@section('titulo')
    Gestão de alunos<br>
    <a class="btn btn-light" href="{{ route('aluno.create') }}">Criar aluno</a>
@endsection

@section('conteudo')
    <form class="mb-3" method="GET" action="{{ route('aluno.search') }}">
        <div class="input-group">
            <input id="filtro" name="filtro" class="form-control" type="text" 
                   placeholder="Pesquisar..." value="{{ $filtro ?? '' }}" autofocus>
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </div>
    </form>

   <table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Matrícula</th>
            <th>Telefones</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->endereco }}</td>
                <td>{{ $aluno->matricula }}</td>
                <td>
                    @forelse($aluno->telefone as $tel)
                        <span class="badge bg-secondary">
                            {{ $tel->descricao }}: {{ $tel->numero }}
                        </span><br>
                    @empty
                        <span class="text-muted">—</span>
                    @endforelse
                </td>
                <td style="white-space: nowrap;">
                    <a title="Ver/editar" class="btn btn-sm btn-secondary" href="{{ route('aluno.view', $aluno->id) }}">✏️</a>
                    <a title="Excluir" class="btn btn-sm btn-danger btn-excluir" href="{{ route('aluno.destroy', $aluno->id) }}">🗑️</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Nenhum aluno cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.btn-excluir').forEach(function (botao) {
                botao.addEventListener('click', function (event) {
                    if (!confirm('Tem certeza que deseja excluir este aluno?')) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
@endsection