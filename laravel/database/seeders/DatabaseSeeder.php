<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
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
        $articles = Article::factory()->count(100)->create();
        $tags = Tag::factory()->count(100)->create();

        foreach($articles as $item)
        {
            $item->tags()->attach($tags->random(rand(1, 5)));
        }
    }
}
