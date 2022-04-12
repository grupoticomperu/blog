<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;

Use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UsersController extends Controller
{

    public function index()
    {
         $users = User::all();
         return view('admin.users.index', compact('users'));
    }


    public function create()
    {
         return view('admin.users.create');
    }



    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    {      
        //$roles = Role::pluck('name', 'id');//mandara un array asociativo con clave 
        $roles = Role::with('permissions')->get();
        //valor y no un array de objetos
        $permissions = Permission::pluck('name','id');
         return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {


      //  $data = $request->validate($rules);
        $data = $request->validated();

       /* $data = $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)]
        ]);*/

        $user->update($data);

        //return back()->withflash('Usuario Actualizado');
        return redirect()->route('admin.users.edit', $user)->with('flash', 'UsuarioActualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
