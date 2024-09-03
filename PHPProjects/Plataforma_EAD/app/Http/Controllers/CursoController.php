<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    /**
     * Exibir o formulário para criar um novo curso.
     */
    public function create()
    {
        return view('create-course');
    }

    /**
     * Armazenar um novo curso no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'preco' => 'required|numeric|min:0',
        ]);

        Curso::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data_inicio' => $request->input('data_inicio'),
            'data_fim' => $request->input('data_fim'),
            'preco' => $request->input('preco'),
            'professor_id' => Auth::guard('professor')->user()->id,
        ]);

        return redirect()->route('professor.dashboard')->with('status', 'Curso criado com sucesso!');
    }

    /**
     * Exibir uma lista de todos os cursos do professor autenticado.
     */
    public function index()
    {
        $cursos = Curso::where('professor_id', Auth::guard('professor')->user()->id)->get();
        return view('cursos', compact('cursos'));
    }

    /**
     * Exibir o formulário para editar o curso.
     */
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);

        // Verificar se o curso pertence ao professor autenticado
        if ($curso->professor_id != Auth::guard('professor')->user()->id) {
            return redirect()->route('cursos.index')->with('error', 'Você não tem permissão para editar este curso.');
        }

        return view('edit-course', compact('curso'));
    }

    /**
     * Atualizar o curso no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        // Verificar se o curso pertence ao professor autenticado
        if ($curso->professor_id != Auth::guard('professor')->user()->id) {
            return redirect()->route('cursos.index')->with('error', 'Você não tem permissão para atualizar este curso.');
        }

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'preco' => 'required|numeric|min:0',
        ]);

        $curso->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data_inicio' => $request->input('data_inicio'),
            'data_fim' => $request->input('data_fim'),
            'preco' => $request->input('preco'),
        ]);

        return redirect()->route('professor.cursos')->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remover o curso do banco de dados.
     */
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);

        // Verificar se o curso pertence ao professor autenticado
        if ($curso->professor_id != Auth::guard('professor')->user()->id) {
            return redirect()->route('cursos.index')->with('error', 'Você não tem permissão para excluir este curso.');
        }

        $curso->delete();

        return redirect()->route('professor.cursos')->with('success', 'Curso excluído com sucesso!');
    }
}
