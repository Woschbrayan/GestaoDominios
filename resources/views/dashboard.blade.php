<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/layouts/dashboard.css') }}">
</head>
<body>
<form id="logout-form" action="/logout" method="POST" style="display: none;">
    @csrf
</form>
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="nav-brand">Gestão de Domínios</a>
            <ul class="nav-menu">
                <li><a href="#" onclick="loadPage('/home')"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#" onclick="loadPage('/domains')"><i class="fas fa-globe"></i> Domínios</a></li>
                <li><a href="#" onclick="loadPage('/domains/expired')"><i class="fas fa-exclamation-circle"></i> Vencidos</a></li>
                <li><a href="#" onclick="loadPage('/domains/active')"><i class="fas fa-check-circle"></i> Ativos</a></li>
                <li><a href="#" onclick="loadPage('/users')"><i class="fas fa-users"></i> Usuários</a></li>
            </ul>
            <a href="#" class="nav-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </nav>

    <div class="container">
        <iframe id="contentFrame" src="/home" class="content-frame"></iframe>
    </div>

    <script>
        function loadPage(url) {
            document.getElementById('contentFrame').src = url;
        }
    </script>
</body>
</html>
