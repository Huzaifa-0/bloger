<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        $user = User::factory()->create([
            'name' => 'Huzaifa_user',
            'email'=>'user@gmail.com',
            'password' => '123456789',
        ]);
        $user->assignRole('user');

        $admin = User::factory()->create([
            'name' => 'Huzaifa_admin',
            'email'=>'admin@gmail.com',
            'password' => '123456789',
        ]);
        $admin->assignRole('admin');

        $editor = User::factory()->create([
            'name' => 'Huzaifa_editor',
            'email'=>'editor@gmail.com',
            'password' => '123456789',
        ]);
        $editor->assignRole('editor');


//        Post::factory(5)->create([
//            'user_id' => $user->id
//        ]);
    }
}
