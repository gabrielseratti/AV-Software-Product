<?php
namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class UpdatePostTitle extends Command
{
    protected $signature = 'posts:update-title {title}';
    protected $description = 'Atualiza o título de todas as postagens';

    public function handle()
    {
        $newTitle = $this->argument('title');
        
        $count = Post::query()->update(['title' => $newTitle]);
        
        $this->info("✅ {$count} postagens atualizadas com o título: {$newTitle}");
        
        return Command::SUCCESS;
    }
}