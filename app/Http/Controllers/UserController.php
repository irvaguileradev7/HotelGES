<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate();
        

        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|min:5|unique:users',
                'email' => 'required',
                'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
                'role_id' => 'required|between:1,3'
            ]);
    
            $input = $request->all();
            $input['password'] = Hash::make($input['password']); 
            User::create($input);
    
            return redirect()->route('users.index')
                ->with('success', 'El usuario se creó satisfactoriamente');
        }catch (\Exception $e){
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function show(User $user)
    {
        $roles = Role::all();
        return view('users.show', compact('user','roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user->update($input);

        return redirect()->route('users.index')
            ->with('success', 'El usuario se modificó satisfactoriamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'El usuario se elimino con exito');
    }
}
