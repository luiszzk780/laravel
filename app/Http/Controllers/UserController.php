<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

    return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255|unique:users','users',
            'password' => 'required|string|min:8|confirmed', 
            ]);
            // 3. Se a validação passou, criar o novo usuário
            $user = new User();
            $user->name = $validatedData['name']; 
            $user->email = $validatedData['email'];
            $user->password = bcrypt($validatedData['password']);

            $user->save(); 
            return redirect()->route('users.index')
            ->with('success', 'Usuário criado com sucesso!'); 
            }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user){
         
         // 2. Retorna a view 'users.edit' e passa o objeto $user para ela
         // Assim, a view terá acesso aos dados do usuário para preencher o formulário
         return view('users.edit', ['User' => $user]);
         // ou usando compact: return view('users.edit', compact('user'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user){
        // 1. Validar os dados recebidos
 $validatedData = $request->validate ([ 'name' => 'required|string|max:255',
 // Para o email, a regra 'unique' precisa ignorar o email do próprio usuário que estamos

 // Senão, ele daria erro dizendo que o email já existe (porque pertence a ele mesmo).
 'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
 // A senha agora é opcional ('nullable'). Se for fornecida, deve ter min 8 caracteres e ser 

 'password' => 'nullable|string|min:8|confirmed',
]);



 $user->name = $validatedData['name'];
 $user->email = $validatedData['email'];

 if (!empty($validatedData['password'])) { 
 $user->password = bcrypt($validatedData['password']);
 }
 $user->save();
 return redirect()->route('users.index')
 ->with('success', 'Usuário atualizado com sucesso!');
}

 public function destroy(User $user){
    $user->delete();
   
    return redirect()->route('users.index')
    ->with('success', 'Usuário deletado com sucesso!');
 }};