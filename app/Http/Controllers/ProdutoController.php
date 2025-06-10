<?php
namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    // Mostrar todos os produtos
    public function index()
    {
    $produtos = Produto::all();
    return view('produtos.index', compact('produtos'));
 }
 // Formulário para criar novo produto
 public function create()
 {
 return view('produtos.create');
 }
 // Salvar novo produto
 public function store(Request $request)
 {
 $request->validate([
 'nome' => 'required',
 'descricao' => 'required',
 'imagem' => 'image|nullable'
 ]);
 $imagem = null;
 if ($request->hasFile('imagem')) {
 $imagem = $request->file('imagem')->store('imagens', 'public');
 }
 Produto::create([
 'nome' => $request->nome,
 'descricao' => $request->descricao,
 'imagem' => $imagem
 ]);
 return redirect()->route('produtos.index');
 }
 // Formulário para editar
 public function edit(Produto $produto)
 {
 return view('produtos.edit', compact('produto'));
 }
 // Atualizar produto
 public function update(Request $request, Produto $produto)
 {
 $request->validate([
 'nome' => 'required',
 'descricao' => 'required',
 'imagem' => 'image|nullable'
 ]);
 if ($request->hasFile('imagem')) {
    if ($produto->imagem) {
        Storage::disk('public')->delete($produto->imagem);
        }
        $produto->imagem = $request->file('imagem')->store('imagens', 'public');
        }
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->save();
        return redirect()->route('produtos.index');
        }
        // Apagar produto
        public function destroy(Produto $produto)
        {
        if ($produto->imagem) {
        Storage::disk('public')->delete($produto->imagem);
        }
        $produto->delete();
        return redirect()->route('produtos.index');
        }
       }
