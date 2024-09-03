<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de Ensino à Distância - Let`s Study</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <h1>Let`s Study</h1>
                <ul>
                    <li><a href="{{ route('home') }}" class="btn-main">Início</a></li>

                    @auth('aluno')
                        <li><a href="{{ route('aluno.dashboard') }}" class="btn-main">Home Aluno</a></li>
                        <li><a href="{{ route('aluno.cursos') }}" class="btn-main">Meus Cursos</a></li>
                    @endauth

                    @auth('professor')
                        <li><a href="{{ route('professor.dashboard') }}" class="btn-main">Home Professor</a></li>
                        <li><a href="{{ route('professor.cursos') }}" class="btn-main">Meus Cursos</a></li>
                    @endauth

                    @guest
                        <li><a href="{{ route('login.aluno') }}" class="btn-main">Login Aluno</a></li>
                        <li><a href="{{ route('login.professor') }}" class="btn-main">Login Professor</a></li>
                        <li><a href="{{ route('register') }}" class="btn-secondary">Cadastrar-se</a></li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Bem-vindo à Plataforma de Ensino EAD</h1>

            @guest
          
            @endguest
        </div>
    </main>

    <footer>
        <div class="container">
            @auth('aluno')
                <form action="{{ route('logout.aluno') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-main">Logout Aluno</button>
                </form>
            @endauth

            @auth('professor')
                <form action="{{ route('logout.professor') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-main">Logout Professor</button>
                </form>
            @endauth
        </div>
    </footer>
</body>
</html>