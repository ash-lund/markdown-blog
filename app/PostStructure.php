<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use League\CommonMark\Normalizer\SlugNormalizer;
use Symfony\Component\Yaml\Yaml;

class PostStructure
{
    public ?string $slug;

    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $title,
        public array $categories,
        public string $publishedAt,
    ) {
        $this->slug = $this->getSlug();
    }

    public function create()
    {
        $config = Yaml::dump((array) $this, 2, 4, Yaml::DUMP_OBJECT);
        if (! Storage::disk('marker')->exists($this->slug)) {
            Storage::disk('marker')->makeDirectory($this->slug);
        }

        Storage::disk('marker')->put($this->slug.'/config.yaml', $config);
    }

    /**
     * Get the slug for the post.
     */
    public function getSlug(): string
    {
        return (new SlugNormalizer())->normalize($this->title);
    }
}
