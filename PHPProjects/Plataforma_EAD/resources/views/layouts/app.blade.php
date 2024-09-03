<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Let\'s Study')</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <a href="#" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
                </a>
                <ul class="nav-links">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Início</a></li>

                    @auth('aluno')
                        <li class="nav-item"><a href="{{ route('aluno.dashboard') }}" class="nav-link">Home Aluno</a></li>
                        <li class="nav-item"><a href="{{ route('aluno.cursos') }}" class="nav-link">Meus Cursos</a></li>
                    @endauth

                    @auth('professor')
                        <li class="nav-item"><a href="{{ route('professor.dashboard') }}" class="nav-link">Home Professor</a></li>
                        <li class="nav-item"><a href="{{ route('cursos.create') }}" class="nav-link">Criar Curso</a></li>
                        <li class="nav-item"><a href="{{ route('professor.cursos') }}" class="nav-link">Meus Cursos</a></li>
                    @endauth

                    @guest
                        <li class="nav-item"><a href="{{ route('login.aluno') }}" class="nav-link">Login Aluno</a></li>
                        <li class="nav-item"><a href="{{ route('login.professor') }}" class="nav-link">Login Professor</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Cadastrar-se</a></li>
                    @endguest

                    @auth
                        
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            @auth('aluno')
            <form action="{{ route('logout.aluno') }}" method="POST">
                @csrf
                <button type="submit" class="btn-main">Logout Aluno</button>
            </form>
        @endauth

        @auth('professor')
            <form action="{{ route('logout.professor') }}" method="POST">
                @csrf
                <button type="submit" class="btn-main">Logout Professor</button>
            </form>
        @endauth
            <a href="#" class="logo-footer">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img-footer">
            </a>
            <p>&copy; 2024 Let&apos;s Study. Todos os direitos reservados.</p>
            <ul class="footer-links">
                <li class="nav-item"><a href="#">Sobre</a></li>
                <li class="nav-item"><a href="#">Contato</a></li>
                <li class="nav-item"><a href="#">Política de Privacidade</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
