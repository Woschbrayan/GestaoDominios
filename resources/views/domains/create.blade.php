<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Domínios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/pages/dominios.css') }}">
</head>
<div class="container mt-5">
    <h2>Adicionar Novo Domínio</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul type="none">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/domains">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome do Domínio:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Empresa:</label>
            <select name="company_id" class="form-control" required>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status:</label>
            <select name="status" class="form-control" required>
                <option value="Ativo">Ativo</option>
                <option value="Expirado">Expirado</option>
                <option value="Pendente">Pendente</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Expiração:</label>
            <input type="date" name="expiration_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>