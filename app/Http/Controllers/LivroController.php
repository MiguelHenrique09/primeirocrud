<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
     public function index(){
    
        $livro = Livro::all();
        return view('livro.lista', ['livros' => $livro, 'filtro' => '']);
    }

    public function create(){
        return view('livro.crialivro');
    }

    public function store(Request $request) {
        try {
            $livro = new Livro();
            $livro->nome = $request->input('nomelivro');
            $livro->autor = $request->input('autor');
            $livro->isbn = $request->input('isbn');
            $livro->save();

            session()->flash('msg', 'Armazenado com sucesso!');
            return redirect()->route('livro.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao armazenar: ' . $e->getMessage());
            return redirect()->route('livro.create');
        }
        
    }

    public function view($id) {
        try {
            $livro = Livro::find($id);
            return view('livro.visualizar', ['livro' => $livro]);

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao carregar: ' . $e->getMessage());
            return redirect()->route('livro.index');
        }
    }

    public function update(Request $request, $id) {
        try {
            $livro = Livro::find($id);
            $livro->nome = $request->input('nomelivro');
            $livro->autor = $request->input('autor');
            $livro->isbn = $request->input('isbn');
            $livro->save();

            session()->flash('msg', 'Atualizado com sucesso!');
            return redirect()->route('livro.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao atualizar: ' . $e->getMessage());
            return redirect()->route('livro.view', ['id' => $id]);
        }   
    }

    public function destroy($id) {
        try {
            $livro = Livro::find($id);
            $livro->delete();

            session()->flash('msg', 'Registro excluído com sucesso!');
            return redirect()->route('livro.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao excluir: ' . $e->getMessage());
            return redirect()->route('livro.index');
        }
    }

    public function search(Request $request)
    {
        $filtro = trim((string) $request->input('filtro', ''));

        $livro = Livro::where('nome', 'like', "%{$filtro}%")                  
                       ->orderBy('id')
                       ->get();

        return view('livro.lista', ['livros' => $livro, 'filtro' => $filtro]);
    
    }}
