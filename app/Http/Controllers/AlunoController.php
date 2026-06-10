<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('aluno.lista', ['alunos' => $alunos, 'filtro' => '']);
    }

    public function create(){
        return view('aluno.cria');
    }

    public function store(Request $request) {
        try {
            $aluno = new Aluno();
            $aluno->nome = $request->input('nome');
            $aluno->endereco = $request->input('endereco');
            $aluno->matricula = $request->input('matricula');
            $aluno->telefone = $request->input('telefone');
            $aluno->save();

            session()->flash('msg', 'Armazenado com sucesso!');
            return redirect()->route('aluno.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao armazenar: ' . $e->getMessage());
            return redirect()->route('aluno.create');
        }
        
    }

    public function view($id) {
        try {
            $aluno = Aluno::find($id);
            return view('aluno.visualizar', ['aluno' => $aluno]);

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao carregar: ' . $e->getMessage());
            return redirect()->route('aluno.index');
        }
    }

    public function update(Request $request, $id) {
        try {
            $aluno = Aluno::find($id);
            $aluno->nome = $request->input('nome');
            $aluno->endereco = $request->input('endereco');
            $aluno->matricula = $request->input('matricula');
            $aluno->telefone = $request->input('telefone');
            $aluno->save();

            session()->flash('msg', 'Atualizado com sucesso!');
            return redirect()->route('aluno.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao atualizar: ' . $e->getMessage());
            return redirect()->route('aluno.edit', ['id' => $id]);
        }   
    }

    public function destroy($id) {
        try {
            $aluno = Aluno::find($id);
            $aluno->delete();

            session()->flash('msg', 'Registro excluído com sucesso!');
            return redirect()->route('aluno.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao excluir: ' . $e->getMessage());
            return redirect()->route('aluno.index');
        }
    }

    public function search(Request $request)
    {
        $filtro = trim((string) $request->input('filtro', ''));

        $alunos = Aluno::where('nome', 'like', "%{$filtro}%")                  
                       ->orderBy('id')
                       ->get();

        return view('aluno.lista', ['alunos' => $alunos, 'filtro' => $filtro]);
    }
}
