@extends('layouts.app')

@section('title', 'Cursos Disponíveis')

@section('content')
    <div class="container">
        <h1>Cursos Disponíveis</h1>

        @if($cursos->isEmpty())
            <p>Atualmente, não há cursos disponíveis.</p>
        @else
            <div class="card-container">
                @foreach($cursos as $curso)
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ $curso->nome }}</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Descrição:</strong> {{ $curso->descricao }}</p>
                            <p><strong>Data de Início:</strong> {{ \Carbon\Carbon::parse($curso->data_inicio)->format('d/m/Y') }}</p>
                            <p><strong>Data de Fim:</strong> {{ \Carbon\Carbon::parse($curso->data_fim)->format('d/m/Y') }}</p>
                            <p><strong>Preço:</strong> R$ {{ number_format($curso->preco, 2, ',', '.') }}</p>

                            <form action="{{ route('aluno.inscrever', $curso->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-main">Inscrever-se</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
