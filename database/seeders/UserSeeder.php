<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
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
        //Role::truncate();
        //user::truncate();
        //Permission::truncate();

        $adminRole = Role::create(['name'=>'Admin']);
        $writerRole = Role::create(['name'=>'Writer']);

        $viewPostsPermission = Permission::create(['name'=>'view Post']);
        $createPostsPermission = Permission::create(['name'=>'create Post']);
        $updatePostsPermission = Permission::create(['name'=>'update Post']);
        $deletePostsPermission = Permission::create(['name'=>'delete Post']);

        $admin = new User;
        $admin->name = 'Michael';
        $admin->email = 'michael@ticomperu.com';
        $admin->password = bcrypt('12345678');
        $admin->save();

        $admin->assignRole($adminRole);


        $writer = new User;
        $writer->name = 'Karin';
        $writer->email = 'karin@ticomperu.com';
        $writer->password = bcrypt('12345678');
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
