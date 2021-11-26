<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        User::create([
            'name' => 'Aldi Ageng',
            'username' => 'aldiageng',
            'email' => 'aldiageng@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Animation',
            'slug' => 'animation'
        ]);
        Category::create([
            'name' => 'Documentary',
            'slug' => 'documentary'
        ]);

        Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        Post::factory(20)->create();
    }
}







