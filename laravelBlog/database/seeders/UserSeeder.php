<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Joe',
            'email'=>'joe@web.de',
            'email_verified_at'=> now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=> Str::random(10),
        ]);

        // Die Posts werden in diesem Fall über UserSeeder erstellt
        User::factory(10)
        ->has(Post::factory()->count(3))
        ->create();

    }
}
