<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Fiction',
                'description' => 'Imaginative narratives and stories that are not based on real events, including literary fiction and contemporary novels.'
            ],
            [
                'name' => 'Mystery',
                'description' => 'Stories centered around solving crimes, puzzles, or unexplained events, keeping readers guessing until the end.'
            ],
            [
                'name' => 'Fantasy',
                'description' => 'Magical worlds filled with mythical creatures, supernatural powers, and epic adventures beyond reality.'
            ],
            [
                'name' => 'Science Fiction',
                'description' => 'Speculative stories exploring futuristic technology, space exploration, time travel, and alternate realities.'
            ],
            [
                'name' => 'Romance',
                'description' => 'Heartwarming tales of love, relationships, and emotional connections between characters.'
            ],
            [
                'name' => 'Thriller',
                'description' => 'Fast-paced, suspenseful stories filled with tension, danger, and unexpected plot twists.'
            ],
            [
                'name' => 'Biography',
                'description' => 'True accounts of real people\'s lives, achievements, and personal journeys through history.'
            ],
            [
                'name' => 'Self-Help',
                'description' => 'Practical guides for personal development, motivation, wellness, and improving various aspects of life.'
            ],
            [
                'name' => 'History',
                'description' => 'Non-fiction works exploring past events, civilizations, and the stories that shaped our world.'
            ],
            [
                'name' => 'Young Adult',
                'description' => 'Stories written for teenagers and young adults, dealing with coming-of-age themes and contemporary issues.'
            ],
        ];

        foreach($categories as &$category) {
            $category['slug'] = Str::slug($category['name']);
        }
        Category::insert($categories);
    }
}
