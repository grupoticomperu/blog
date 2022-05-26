<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
//importamos para asignar roles y permisos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission::truncate();
        //Role::truncate();
        //User::truncate();
        

       $adminRole = Role::create(['name'=>'Admin']);
       $writerRole = Role::create(['name'=>'Writer']);

       
        $viewPostsPermission = Permission::create(['name'=>'view Post']);
        $createPostsPermission = Permission::create(['name'=>'create Post']);
        $updatePostsPermission = Permission::create(['name'=>'update Post']);
        $deletePostsPermission = Permission::create(['name'=>'delete Post']);
       

        $admin = new User;
        $admin->name = 'Michael';
        $admin->email = 'michael@ticomperu.com';
        $admin->password = '$2y$10$CYEZIWvPN/i3MK1LC8oTmeMWKLMzcuaxF.dW2TxMXmfhdcLocIY4m';
        $admin->save();

        $admin->assignRole($adminRole);


        $writer = new User;
        $writer->name = 'Karin';
        $writer->email = 'karin@ticomperu.com';
        $writer->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $writer->save();

        $writer->assignRole($writerRole);

/*
        User::create([
            'name' => 'Michael Cabello Alvino',
            'email' => 'michael@ticomperu.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Karin Cabello Ramirez',
            'email' => 'karin@ticomperu.com',
            'password' => bcrypt('12345678')
        ]);
*/

    }
}
