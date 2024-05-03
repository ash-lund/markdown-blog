<?php

namespace App\Console\Commands;

use App\PostStructure;
use Illuminate\Console\Command;

use function Laravel\Prompts\text;
use function Laravel\Prompts\textarea;

class MarkerCreatePostStructure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marker:post:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates blogpost structure (folder, YAML config, empty markdown document)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $title = text(
            label: 'Enter the title of the post',
            placeholder: 'My awesome post',
            hint: 'This will be used for the title, the folder and slug of the post',
            required: true,
        );
        $categories = textarea(
            label: 'Categories',
            placeholder: 'php, laravel, testing',
            hint: 'Comma separated list of categories',
        );
        $publishedAt = text(
            label: 'Published at',
            default: date('Y-m-d H:i:s'),
            hint: 'Date and time for when the post was published',
            required: true,
        );

        $categories = array_map('trim', explode(',', $categories));

        $postStructure = new PostStructure(
            title: $title,
            categories: $categories,
            publishedAt: $publishedAt,
        );

        dd($postStructure);
    }
}
