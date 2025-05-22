<h1>Keeoinhp</h1>
<p>Seja bem vindo ao Keepinho, o seu assistente pessoal (melhor do que o Google).</p>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    {{-- Adicionando um estilo simples para a tabela --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            padding: 10px 15px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            margin: 5px 0;
        }

        .btn-create {
            background-color: #28a745;
        }

        /* Verde */
        .btn-edit {
            background-color: #ffc107;
            color: #333;
        }

        /* Amarelo */
        .btn-delete {
            background-color: #dc3545;
        }

        /* Vermelho */
        .actions a,
        .actions form {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <h1>Lista de Usuários</h1>
    {{-- Link para criar um novo usuário --}}
    <a href="{{ route('users.create') }}" class="btn btn-create">Adicionar Novo Usuário</a>
    {{-- Verifica se existe uma mensagem de sucesso na sessão (após criar, editar ou deletar) --}}
    @if (session('success'))
            <div style="padding: 10px; margin-bottom: 15px; background-color: #d4edda; color:
        #155724; border: 1px solid #c3e6cb; border-radius: 4px;">
                {{ session('success') }}
            </div>
    @endif
    {{-- Verifica se há usuários para listar --}}
    @if ($users->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop para percorrer cada usuário da lista $users --}}
                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td> {{-- Mostra o ID do usuário --}}
                                    <td>{{ $user->name }}</td> {{-- Mostra o Nome do usuário --}}
                                    <td>{{ $user->email }}</td> {{-- Mostra o Email do usuário --}}
                                    <td class="actions">
                                        {{-- Link para editar o usuário. Chamamos a rota 'users.edit' passando o ID do
                                        usuário --}}
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit">Editar</a>
                                        {{-- Formulário para deletar o usuário. Chamamos a rota 'users.destroy' --}}
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf {{-- Token de segurança do Laravel, muito importante para formulários
                                            POST, PUT, DELETE --}}
                                            @method('DELETE') {{-- Informa ao Laravel que, apesar de ser um POST, o
                                            método HTTP real é DELETE --}}
                                            <button type="submit" class="btn btn-delete" onclick="return confirm('Tem
                    certeza que deseja deletar este usuário?')">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum usuário cadastrado ainda.</p>
    @endif
</body>

</html>