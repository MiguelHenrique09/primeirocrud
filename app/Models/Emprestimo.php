<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emprestimo extends Model
{
    use HasFactory;

	protected $table = 'emprestimo';

public function aluno() {
    return $this->belongsTo(Aluno::class);
}

public function livro() {
    return $this->belongsTo(Livro::class);
} 
}
