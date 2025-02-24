<link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">

<div class="login-container">
    <div class="login-card">
        <h2>Login</h2>
        
        {{-- Exibe mensagem de sucesso se houver --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Exibe mensagem de erro se houver --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
        <a href="/register" class="register-link">Não tem uma conta? Registre-se</a>
    </div>
</div>
