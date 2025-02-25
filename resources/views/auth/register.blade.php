<link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">

<div class="login-container">
    <div class="login-card">
        <h2>Cadastro</h2>

       
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

   
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <a href="/" class="register-link">Já tem uma conta? Faça login</a>
    </div>
</div>
