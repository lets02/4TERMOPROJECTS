<!-- resources/views/create-course.blade.php -->
@extends('layouts.app')

@section('title', 'Criar Curso')

@section('content')
    <style>
        /* Estilos específicos para o formulário de criação de curso */
        .create-course-container {
            max-width: 600px; /* Diminuir a largura máxima do contêiner */
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .create-course-container h1 {
            color: #dd51bf;
            margin-bottom: 15px;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            font-size: 24px; /* Diminuir o tamanho da fonte do título */
        }

        .create-course-container .form-group {
            margin-bottom: 15px; /* Reduzir o espaço entre os campos */
        }

        .create-course-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
            font-family: 'Arial', sans-serif;
            font-size: 14px; /* Diminuir o tamanho da fonte das labels */
        }

        .create-course-container .form-control {
            width: 100%;
            padding: 12px; /* Reduzir o padding dos campos */
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
            font-size: 14px; /* Diminuir o tamanho da fonte dos campos */
        }

        .create-course-container .form-control:focus {
            border-color: #e66dcb;
            box-shadow: 0 0 4px rgba(216, 27, 96, 0.3);
            outline: none;
        }

        .create-course-container .btn-primary {
            background-color: #eb32c9;
            border: none;
            color: white;
            padding: 10px 20px; /* Diminuir o padding do botão */
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px; /* Diminuir o tamanho da fonte do botão */
            font-family: 'Arial', sans-serif;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .create-course-container .btn-primary:hover {
            background-color: #b2509e;
        }

        .create-course-container .btn-primary:focus {
            outline: none;
        }
    </style>

    <div class="create-course-container">
        <h1>Criar Novo Curso</h1>
        <form method="POST" action="{{ route('cursos.store') }}">
            @csrf

            <div class="form-group">
                <label for="nome">Nome do Curso</label>
                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" class="form-control" name="descricao" required>{{ old('descricao') }}</textarea>
            </div>

            <div class="form-group">
                <label for="data_inicio">Data de Início</label>
                <input id="data_inicio" type="date" class="form-control" name="data_inicio" value="{{ old('data_inicio') }}" required>
            </div>

            <div class="form-group">
                <label for="data_fim">Data de Fim</label>
                <input id="data_fim" type="date" class="form-control" name="data_fim" value="{{ old('data_fim') }}" required>
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input id="preco" type="number" step="0.01" class="form-control" name="preco" value="{{ old('preco') }}" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-primary">Criar Curso</button>
            </div>
        </form>
    </div>
@endsection
