<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Footer</title>
    <style>
        /* Reset básico */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f5f5f5;
        }

        /* Estilos do footer */
        .container-flex {
            background-color: #fff;
            color: #555;
            padding: 20px 40px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
            position: relative;
        }

        .container-flex::before {
            content: "";
            display: block;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #e91e63, #f06292);
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .container-flex h3 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 400;
            color: #333;
        }

        .container-flex p {
            margin: 10px 0 0;
            font-size: 0.875rem;
            color: #777;
        }

        .container-flex a {
            color: #e91e63;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .container-flex a:hover {
            color: #c2185b;
        }

        .container-flex hr {
            border: 0;
            border-top: 1px solid #e0e0e0;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <footer class="container-flex">
        <hr>
        <h3>Este é o meu footer</h3>
        <p>&copy; 2024 MeuSite. Todos os direitos reservados.</p>
        <p>
            <a href="#">Sobre</a> |
            <a href="#">Contato</a> |
            <a href="#">Privacidade</a>
        </p>
    </footer>
</body>
</html>
