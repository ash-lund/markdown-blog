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
            $postFileContent = Storage::disk('marker')->get($folder.'/post.md');
            $postContent = (new CommonMarkConverter())->convert($postFileContent)->getContent();

            return [
                'config' => Yaml::parse(Storage::disk('marker')->get($folder.'/config.yaml')),
                'content' => Str::limit($postContent, 500, '...'),
            ];
        }, $folders);

        return $posts;
    }
}
