<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Curso extends Model
{
    use HasFactory;

    // Define a tabela associada ao modelo
    protected $table = 'cursos';

    // Define os atributos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'descricao',
        'data_inicio',
        'data_fim',
        'preco',
        'professor_id', // Inclua o campo professor_id
    ];

    // Relacionamento: Um curso pode ter muitos alunos.
    public function alunos(): BelongsToMany
    {
        return $this->belongsToMany(Aluno::class, 'aluno_curso', 'curso_id', 'aluno_id');
    }

    // Relacionamento: Um curso pertence a um professor.
    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id'); // Verifique o nome correto do modelo de professor
    }

    // Defina os casts para formatação das datas
    protected $casts = [
        'data_inicio' => 'datetime',
        'data_fim' => 'datetime',
    ];
}
