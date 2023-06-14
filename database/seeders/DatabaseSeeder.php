<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(4)->create();
        User::factory(4)
            ->create()
            ->each(function($user) use($categories) {
                $user->posts()->createMany(
                    Post::factory(3)->make([
                        'user_id' => $user->id,
                        'category_id' => $categories->random()->id,
                    ])->toArray()
                );
            });


    }
}
