<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Hier werden alle auszufürdenden Seeders im Array eingetragen.
        // php artisan migrate:fresh --seed
        $this->call([
            UserSeeder::class,
        ]);
    }
}
