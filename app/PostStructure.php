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
    }

    /**
     * Get the slug for the post.
     */
    public function getSlug(): string
    {
        return (new SlugNormalizer())->normalize($this->title);
    }
}
