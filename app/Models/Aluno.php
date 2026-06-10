<?php

namespace App\Models;
use App\Models\Telefone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aluno extends Model
{
    use HasFactory, softDeletes;

	protected $table = 'aluno';

	public function telefone(): HasMany  
    {
        return $this->hasMany(Telefone::class);
    }

    public function livros(): BelongsToMany
    {
        return $this->belongsToMany(Livro::class, 'emprestimo')->withPivot('datahora', 'datahora_devolucao')->withTimestamps();
    }
}
