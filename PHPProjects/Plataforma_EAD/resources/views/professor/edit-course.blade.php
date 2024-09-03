@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
    <div class="container">
        <h1>Editar Curso</h1>
        <form method="POST" action="{{ route('cursos.update', $curso->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome do Curso</label>
                <input id="nome" type="text" class="form-control" name="nome" value="{{ $curso->nome }}" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" class="form-control" name="descricao" required>{{ $curso->descricao }}</textarea>
            </div>

            <div class="form-group">
                <label for="data_inicio">Data de Início</label>
                <input id="data_inicio" type="date" class="form-control" name="data_inicio" value="{{ $curso->data_inicio->format('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="data_fim">Data de Fim</label>
                <input id="data_fim" type="date" class="form-control" name="data_fim" value="{{ $curso->data_fim->format('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input id="preco" type="number" step="0.01" class="form-control" name="preco" value="{{ $curso->preco }}" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Atualizar Curso</button>
            </div>
        </form>
    </div>
@endsection

