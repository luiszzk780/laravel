<h1>Lista de Produtos</h1>
<a href="{{ route('produtos.create') }}"> Novo Produto</a>
<ul>
@foreach($produtos as $produto)
 <li>
 <strong>{{ $produto->nome }}</strong><br>
 {{ $produto->descricao }}<br>
 @if($produto->imagem)
 <img src="{{ asset('storage/' . $produto->imagem) }}" width="100"><br>
 @endif
 <a href="{{ route('produtos.edit', $produto) }}"> Editar</a>
 <form action="{{ route('produtos.destroy', $produto) }}" method="POST"
style="display:inline;">
 @csrf
 @method('DELETE')
 <button type="submit"> Apagar</button>
 </form>
 </li>
@endforeach
</ul>
