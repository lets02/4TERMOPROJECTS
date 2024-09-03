<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Header</title>
    <style>
        /* Reset básico */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f5f5f5;
        }

        /* Estilos do header */
        .header {
            background-color: #fff;
            border-bottom: 2px solid #e0e0e0;
            padding: 15px 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            gap: 20px;
        }

        .header-logo {
            font-size: 2rem;
            color: #333;
            font-weight: bold;
        }

        .header-logo h1 {
            margin: 0;
            font-family: 'Georgia', serif;
        }

        .nav-bar,
        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .nav-bar a,
        .header-actions a {
            text-decoration: none;
            color: #555;
            font-size: 1rem;
            transition: color 0.3s, border-bottom 0.3s;
            padding: 5px;
            border-radius: 5px;
        }

        .nav-bar a:hover,
        .header-actions a:hover {
            color: #e91e63;
            border-bottom: 2px solid #e91e63;
        }

        .header-actions input {
            background-color: #e91e63;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.875rem;
            transition: background-color 0.3s;
        }

        .header-actions input:hover {
            background-color: #c2185b;
        }

        .header-divider {
            width: 100%;
            max-width: 1200px;
            border-top: 1px solid #e0e0e0;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="header-logo">
                <h1>MeuSite</h1>
            </div>

            @if (Auth::check())
                @if (Auth::user()->isEmpresa())
                    <div class="header-actions">
                        <a href="/vagas">Acesse Dashboard de Vagas</a>
                    </div>
                @endif
                <div class="header-actions">
                    <h3>Olá, {{ Auth::user()->nome }}</h3>
                    <form action="/logout" method="post">
                        @csrf
                        <input type='submit' value='Sair'>
                    </form>
                </div>
            @else
                <div class="nav-bar">
                    <a href="/login">Login</a>
                    <a href="/registro">Registre-se</a>
                </div>
            @endif
        </div>
        <div class="header-divider"></div>
    </header>
</body>
</html>
