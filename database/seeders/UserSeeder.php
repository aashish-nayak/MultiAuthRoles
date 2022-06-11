<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            ['name'=>'Admin','email'=>'admin@gmail.com','password'=>bcrypt('password')],
            ['name'=>'Editor','email'=>'editor@gmail.com','password'=>bcrypt('password')],
            ['name'=>'Author','email'=>'author@gmail.com','password'=>bcrypt('password')],
        ]);

        Role::insert([
            ['name'=>'Editor','slug'=>'editor'],
            ['name'=>'Author','slug'=>'author'],
        ]);

        Permission::insert([
            ['name'=>'Add Info','slug'=>'add-info'],
            ['name'=>'Delete Info','slug'=>'delete-info'],
            ['name'=>'Edit Info','slug'=>'edit-info'],
        ]);
    }
}
