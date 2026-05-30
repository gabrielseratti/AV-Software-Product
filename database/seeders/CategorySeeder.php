<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Tecnologia', 'description' => 'Notícias sobre tecnologia e inovação'],
            ['name' => 'Esportes', 'description' => 'Notícias esportivas'],
            ['name' => 'Política', 'description' => 'Notícias políticas'],
            ['name' => 'Entretenimento', 'description' => 'Notícias de entretenimento'],
            ['name' => 'Saúde', 'description' => 'Notícias sobre saúde e bem-estar'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}