<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    /**
     * Exibe o dashboard do aluno.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        $aluno = Auth::guard('aluno')->user();
        return view('aluno.dashboard', compact('aluno'));
    }

    /**
     * Exibe a lista de cursos em que o aluno está inscrito.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function cursos()
    {
        $aluno = Auth::guard('aluno')->user();
        $cursos = $aluno->cursos; // Assume que o relacionamento está definido no modelo Aluno

        return view('aluno.cursos', compact('cursos'));
    }

    /**
     * Exibe a lista de todos os cursos disponíveis para inscrição.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function todosCursos()
    {
        $cursos = Curso::all(); // Recupera todos os cursos disponíveis
        return view('aluno.cursos-disponiveis', compact('cursos'));
    }

    /**
     * Inscreve o aluno em um curso.
     *
     * @param int $cursoId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inscreverCurso($cursoId)
    {
        $aluno = Auth::guard('aluno')->user();
        $curso = Curso::findOrFail($cursoId);

        // Verifica se o aluno já está inscrito no curso
        if ($aluno->cursos->contains($curso)) {
            return redirect()->route('aluno.cursos.disponiveis')->with('info', 'Você já está inscrito neste curso.');
        }

        // Associa o curso ao aluno
        // $aluno->cursos()->attach($curso);

        return redirect()->route('aluno.cursos.disponiveis')->with('success', 'Inscrição realizada com sucesso!');
    }

    /**
     * Exibe os detalhes de um curso específico para o aluno.
     *
     * @param int $cursoId
     * @return \Illuminate\Contracts\View\View
     */
    public function showCurso($cursoId)
    {
        $curso = Curso::findOrFail($cursoId);
        $aluno = Auth::guard('aluno')->user();

        if (!$aluno->cursos->contains($curso)) {
            return redirect()->route('aluno.cursos.disponiveis')->withErrors('Você não está inscrito neste curso.');
        }

        return view('aluno.curso-detalhes', compact('curso'));
    }
}
