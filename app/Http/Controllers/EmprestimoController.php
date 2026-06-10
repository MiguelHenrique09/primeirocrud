<?php

namespace App\Http\Controllers;
use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Aluno;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{

    public function index()
    {
        $emprestimos = Emprestimo::all();
        return view('emprestimo.lista', ['emprestimos' => $emprestimos, 'filtro' => '']);
    }

   public function create(){
    $alunos = Aluno::all();
    $livros = Livro::all();
    return view('emprestimo.criaemp', compact('alunos', 'livros'));
}

    public function store(Request $request) {
        try {
           
            $emprestimo = new Emprestimo();
            $emprestimo->aluno_id  = $request->input('aluno_id');  
            $emprestimo->livro_id  = $request->input('livro_id');  
            $emprestimo->datahora  = now();                         
            $emprestimo->save();

            session()->flash('msg', 'Armazenado com sucesso!');
            return redirect()->route('emprestimo.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao armazenar: ' . $e->getMessage());
            return redirect()->route('emprestimo.create');
        }
        
    }
public function devolver($id) {
    try {
        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->datahora_devolucao = now();
        $emprestimo->save();

        session()->flash('msg', 'Devolução registrada!');
        return redirect()->route('emprestimo.index');

    } catch (\Exception $e) {
        session()->flash('erro', 'Erro ao devolver: ' . $e->getMessage());
        return redirect()->route('emprestimo.index');
    }
}
    public function view($id) {
        try {
            $emprestimo = Emprestimo::find($id);
            return view('emprestimo.visualizar', ['emprestimo' => $emprestimo]);

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao carregar: ' . $e->getMessage());
            return redirect()->route('emprestimo.index');
        }
    }

   

    public function destroy($id) {
        try {
            $emprestimo = Emprestimo::find($id);
            $emprestimo->delete();

            session()->flash('msg', 'Registro excluído com sucesso!');
            return redirect()->route('emprestimo.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao excluir: ' . $e->getMessage());
            return redirect()->route('emprestimo.index');
        }
    }

    public function search(Request $request)
    {
        $filtro = trim((string) $request->input('filtro', ''));

        $emprestimos = Emprestimo::where('nome', 'like', "%{$filtro}%")                  
                       ->orderBy('id')
                       ->get();

        return view('emprestimo.lista', ['emprestimos' => $emprestimos, 'filtro' => $filtro]);
    }
}


