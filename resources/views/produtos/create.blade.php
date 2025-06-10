<h1>Adicionar Produto</h1>
<form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/formdata">
 @csrf
 <label>Nome:</label><br>
 <input type="text" name="nome"><br><br>
 <label>Descrição:</label><br>
 <textarea name="descricao"></textarea><br><br>
 <label>Imagem:</label><br>
 <input type="file" name="imagem"><br><br>
 <button type="submit">Salvar</button>
</form>