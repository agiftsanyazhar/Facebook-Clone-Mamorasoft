<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Share;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 100 posts
        for ($i = 1; $i <= 100; $i++) {
            Post::create([
                'user_id' => $i,
                'caption' => 'Caption ' . $i . ': ' . fake()->paragraph(rand(1, 5)),
                'image' => fake()->optional()->imageUrl(),
                'video' => fake()->optional()->imageUrl(),
            ]);
        }

        // Create 100 likes
        for ($i = 1; $i <= 100; $i++) {
            Like::create([
                'user_id' => rand(1, 100),
                'post_id' => rand(1, 100),
            ]);
        }

        // Create 100 comments
        for ($i = 1; $i <= 100; $i++) {
            Comment::create([
                'user_id' => rand(1, 100),
                'post_id' => rand(1, 100),
                'comment' => fake()->sentence(),
            ]);
        }

        // Create 100 shares
        for ($i = 1; $i <= 100; $i++) {
            Share::create([
                'user_id' => rand(1, 100),
                'post_id' => rand(1, 100),
            ]);
        }
    }
}
