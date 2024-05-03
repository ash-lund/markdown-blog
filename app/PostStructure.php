<?php

namespace App;

class PostStructure
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $title,
        public array $categories,
        public string $publishedAt,
    ) {
    }

    public function create()
    {
        $slug = $getSlug($this->title);
    }

    public function getSlug(string $title): string
    {
        return (new SlugNormalizer())->normalize($title);
    }
}
