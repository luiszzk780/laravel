<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Adicionar Novo Usuário</title>
 <style>
 body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; color: #333;
}
 h1 { color: #333; }
 form { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px
    rgba(0,0,0,0.1); max-width: 500px; margin: auto; }
 label { display: block; margin-bottom: 8px; font-weight: bold; }
 input[type="text"], input[type="email"], input[type="password"] {
 width: calc(100% - 22px); padding: 10px; margin-bottom: 15px; border: 1px solid #ddd;
border-radius: 4px;
 }
 button { padding: 10px 20px; color: white; background-color: #28a745; border: none;
border-radius: 4px; cursor: pointer; }
 button:hover { background-color: #218838; }
 a { display: inline-block; margin-top:15px; color: #007bff; text-decoration: none; }
 a:hover { text-decoration: underline; }
 .alert-danger { padding: 10px; margin-bottom: 15px; background-color: #f8d7da; color:
#721c24; border: 1px solid #f5c6cb; border-radius: 4px;}
 .alert-danger ul { margin: 0; padding-left: 20px; }
 </style>
</head>
<body>
 <h1>Adicionar Novo Usuário</h1>
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
 {{-- Formulário para criar um novo usuário --}}
 {{-- A action aponta para a rota 'users.store', que vai processar os dados --}}
 <form action="{{ route('users.store') }}" method="POST">
 @csrf {{-- Token de segurança CSRF, sempre necessário! --}}
 <div>
 <label for="name">Nome:</label>
 <input type="text" id="name" name="name" value="{{ old('name') }}" required>
 {{-- 'name="name"' é como o Laravel vai identificar este campo no backend --}}
 {{-- 'value="{{ old('name') }}"' ajuda a manter o valor digitado caso o formulário dê erro
e precise ser reenviado --}}
 </div>
 <div>
 <label for="email">Email:</label>
 <input type="email" id="email" name="email" value="{{ old('email') }}" required>
 {{-- 'name="email"' --}}
 </div>
 <div>
 <label for="password">Senha:</label>
 <input type="password" id="password" name="password" required>
 {{-- 'name="password"' --}}
 {{-- Para senhas, não usamos old() por segurança --}}
 </div>
 <div>
 <label for="password_confirmation">Confirmar Senha:</label>
 <input type="password" id="password_confirmation" name="password_confirmation"
required>
 {{-- 'name="password_confirmation"' é importante para a validação de confirmação de
senha do Laravel --}}
 </div>
 <div>
 <button type="submit">Salvar Usuário</button>
 </div>
 </form>
 <div style="text-align: center; margin-top: 20px;">
 <a href="{{ route('users.index') }}">Voltar para a Lista</a>
 </div>
</body>
</html>