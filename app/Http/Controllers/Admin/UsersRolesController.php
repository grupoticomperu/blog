<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
//use Spatie\Permission\Models\Role;

class UsersRolesController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->roles);
        //redireccionar
    }
}








