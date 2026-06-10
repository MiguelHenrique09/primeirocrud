<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telefone;
class TelefoneController extends Controller
{
 public function index(){
    
        $telefone = Telefone::all();
        return view('telefone.lista', ['telefone' => $telefone, 'filtro' => '']);
    }

      public function create(){
        return view('telefone.criatelefone');
    }
  public function store(Request $request) {
        try {
            $telefone = new Telefone();
            $telefone->descricao = $request->input('descricao');
            $telefone->aluno_id = $request->input('idaluno');
            $telefone->numero = $request->input('numero');
            $telefone->save();

            session()->flash('msg', 'Armazenado com sucesso!');
            return redirect()->route('telefone.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao armazenar: ' . $e->getMessage());
            return redirect()->route('telefone.create');
        }
        
    }






}
