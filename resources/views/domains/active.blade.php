<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domínios Ativos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/pages/dominios.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Domínios Ativos</h2>

        <div class="d-flex justify-content-between mb-3">
            <a href="/domains/create" class="btn btn-success">Adicionar Novo Domínio</a>
            <form method="GET" action="/domains/active" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Pesquisar domínios..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                       
                        <th>Nome do Domínio</th>
                        <th>Empresa</th>
                        <th>Status</th>
                        <th>Data de Expiração</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($domains as $domain)
                        <tr>
                          
                            <td>{{ $domain->name }}</td>
                            <td>{{ $domain->company->name }}</td>
                            <td><span class="badge bg-success">Ativo</span></td>
                            <td>{{ \Carbon\Carbon::parse($domain->expiration_date)->format('d/m/Y') }}</td>

                            <td class="text-center">
                                <a href="/domains/{{ $domain->id }}/edit" class="btn btn-primary btn-sm">Editar</a>
                                <form action="/domains/{{ $domain->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Tem certeza que deseja excluir?')">
                                        <i class="fas fa-trash"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $domains->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
