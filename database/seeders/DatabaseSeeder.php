<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();

        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);
        $user = Role::create(['name' => 'user']);

         \App\Models\User::create([
             'name' => 'admin',
             'email' => '',
             'password' => Hash::make('password'),
         ])->assignRole($admin);

         \App\Models\User::create([
             'name' => 'manager',
             'email' => 'manager@example.com',
             'password' => Hash::make('password'),
         ])->assignRole($manager);

         \App\Models\Recipe :: create([
            'name'=>'',
            'ingredients'=>'',
            'instructions'=>'',
            'image',
            'status' =>'1'
         ]);

         \App\Models\Recipe :: create([
            'name'=>'',
            'ingredients'=>'',
            'instructions'=>'',
            'image',
            'status' =>'1'
         ]);

         \App\Models\Recipe :: create([
            'name'=>'',  
        
            'ingredients'=>'',
            'instructions'=>'',
            'image',
            'status' =>'1'
         ]);

  

    }
}
