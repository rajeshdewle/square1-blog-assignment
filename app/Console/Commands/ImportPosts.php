<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import posts from API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admin = User::first();
        if (! $admin) {
            return $this->error('No admin user is available! Please create one first!');
        }
        try {
            $response = Http::get(config('services.blog_rest_url'));
            $posts = $response->json()['articles'];
            foreach ($posts as $post) {
                $existPost = Post::where('id', $post['id'])->get();
                if ($existPost->count() > 0) {
                    $this->line('Post with ID: '.$post['id'].' already exists');
                } else {
                    $admin->posts()->create([
                        'id' => $post['id'],
                        'title' => $post['title'],
                        'description' => $post['description'],
                    ]);
                    $this->line('Post created with title: '.$post['title']);
                }
            }
            $this->info('Posts imported successfully!');
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
