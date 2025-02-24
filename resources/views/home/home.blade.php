<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
</head>
<body>
    <div class="home-container">
        <h1>Bem-vindo ao Painel de Gestão</h1>
        <p>Gerencie seus domínios, usuários e empresas de maneira fácil e eficiente.</p>
        <div class="home-grid">
            <a href="/domains" class="home-card">
                <i class="fas fa-globe"></i>
                <span>Gerenciar Domínios</span>
            </a>
            <a href="/domains/expired" class="home-card">
                <i class="fas fa-exclamation-circle"></i>
                <span>Domínios Vencidos</span>
            </a>
            <a href="/domains/active" class="home-card">
                <i class="fas fa-check-circle"></i>
                <span>Domínios Ativos</span>
            </a>
          
            <a href="/users" class="home-card">
                <i class="fas fa-users"></i>
                <span>Usuários</span>
            </a>
        </div>
    </div>
</body>
</html>
