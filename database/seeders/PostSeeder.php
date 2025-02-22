<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Share;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 300 posts
        for ($i = 1; $i <= 300; $i++) {
            Post::create([
                'user_id' => rand(1, 100),
                'caption' => 'Caption ' . $i . ': ' . fake()->paragraph(rand(1, 5)),
                'image_video' => rand(0, 1) ? null : "https://images.unsplash.com/photo-1552519507-da3b142c6e3d?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y2Fyc3xlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80",
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
