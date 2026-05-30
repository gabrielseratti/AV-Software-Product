<?php
namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'Nova versão do Laravel lançada',
                'tag' => 'Laravel',
                'summary' => 'Laravel 11 traz novidades incríveis',
                'content' => 'Conteúdo completo sobre o Laravel 11...',
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'title' => 'Time local vence campeonato',
                'tag' => 'Futebol',
                'summary' => 'Grande vitória no campeonato regional',
                'content' => 'Detalhes da partida emocionante...',
            ],
            [
                'user_id' => 2,
                'category_id' => 1,
                'title' => 'IA revoluciona desenvolvimento',
                'tag' => 'Inteligência Artificial',
                'summary' => 'Como a IA está mudando o desenvolvimento de software',
                'content' => 'Artigo completo sobre IA no desenvolvimento...',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}