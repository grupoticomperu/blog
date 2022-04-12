<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use Spatie\Permission\Models\Permission;

class UsersPermissionsController extends Controller
{
   
	public function update(Request $request, User $user){
		//return $request->permissions;
		$user->syncPermissions($request->permissions);
	}
    
}


