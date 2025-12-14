<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $booksJson = file_get_contents(base_path('books.json'));
        $books = json_decode($booksJson, true);

        // Create a map of category names to IDs
        $categoryMap = Category::pluck('id', 'name');

        foreach(array_slice($books, 0, 10) as $book)
        {
            Book::create([
                'seller_id' => Seller::inRandomOrder()->first()->id,
                'title' => $book['title'],
                'author' => $book['author'],
                'country' => $book['country'],
                'language' => $book['language'],
                'link' => $book['link'],
                'pages' => $book['pages'],
                'year' => $book['year'],
                'category_id' => $categoryMap[$book['genre']] ?? null,
                'is_active' => true,
            ]);
        }
    }
}
