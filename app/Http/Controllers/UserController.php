<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  
    public function index()
    {
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

   
    public function create()
    {

        return view('users.create');

    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'users',
            'password' => 'required|string|min:8|confirmed',
        ]);
     
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);

        $user->save();
        return redirect()->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }



    public function show(string $id)
    {
    
    }

    public function edit(User $user)
    {


        return view('users.edit', ['User' => $user]);
        
    }

   
    public function update(Request $request, User $user)
    {
       
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',


            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            

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

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuário deletado com sucesso!');
    }
}
;