<h1>Editar Produto</h1>
<form action="{{ route('produtos.update', $produto) }}" method="POST"
enctype="multipart/form-data">
 @csrf
 @method('PUT')
 <label>Nome:</label><br>
 <input type="text" name="nome" value="{{ $produto->nome }}"><br><br>
 <label>Descrição:</label><br>
 <textarea name="descricao">{{ $produto->descricao }}</textarea><br><br>
 <label>Imagem Atual:</label><br>
 @if($produto->imagem)
 <img src="{{ asset('storage/' . $produto->imagem) }}" width="100"><br><br>
 @endif
 <label>Nova Imagem:</label><br>
 <input type="file" name="imagem"><br><br>
 <button type="submit">Atualizar</button>
</form>