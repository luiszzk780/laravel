<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    {{-- Reutilizando o mesmo estilo do create para consistência --}}
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Azul para update */
        button:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .alert-danger {
            padding: 10px;
            margin-bottom: 15px;
            background-color: #f8d7da;
            color:
                #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <h1>Editar Usuário: {{ $user->name }}</h1> {{-- Mostra o nome do usuário que está sendo
    editado --}}
    {{-- Se houver erros de validação, eles serão mostrados aqui --}}
    @if ($errors->any())
        <div class="alert alert-danger" style="max-width: 500px; margin: 10px auto;">
            <strong>Opa!</strong> Algo deu errado com os dados que você enviou:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Formulário para editar um usuário --}}
    {{-- A action aponta para a rota 'users.update', passando o ID do usuário --}}
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf {{-- Token de segurança CSRF --}}
        @method('PUT') {{-- Informa ao Laravel que o método HTTP real é PUT (para atualização)
        --}}
        <div>
            <label for="name">Nome:</label>
            {{-- Usamos old() para manter o valor digitado em caso de erro,
            mas se não houver valor 'old', usamos o valor atual do usuário ($user->name) --}}
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div>
            <label for="password">Nova Senha (opcional):</label>
            <input type="password" id="password" name="password">
            {{-- Para edição, a senha é opcional. Se o usuário não digitar nada, não alteramos a senha.
            --}}
            {{-- Não usamos old() para senha por segurança e porque é opcional --}}
        </div>
        <div>
            <label for="password_confirmation">Confirmar Nova Senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <div>
            <button type="submit">Atualizar Usuário</button>
        </div>
    </form>
    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('users.index') }}">Voltar para a Lista</a>
    </div>
</body>

</html>