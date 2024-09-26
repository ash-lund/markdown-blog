<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\CommonMark\CommonMarkConverter;
use Symfony\Component\Yaml\Yaml;

class Post
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function all()
    {
        $folders = Storage::disk('marker')->allDirectories();
        $posts = array_map(function ($folder) {
            $config = Yaml::parse(Storage::disk('marker')->get($folder.'/config.yaml'));
            $postFileContent = Storage::disk('marker')->get($folder.'/post.md');
            $postContent = (new CommonMarkConverter())->convert($postFileContent)->getContent();

            return [
                'title' => $config['title'],
                'slug' => $config['slug'],
                'published_at' => $config['publishedAt'],
                'categories' => $config['categories'],
                'content' => Str::limit($postContent, 200, '...'),
            ];
        }, $folders);

        return $posts;
    }
}
