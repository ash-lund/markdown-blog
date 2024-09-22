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
        $config = Yaml::dump((array) $this, 2, 4);
        if (! Storage::disk('marker')->exists($this->slug)) {
            Storage::disk('marker')->makeDirectory($this->slug);
        }

        Storage::disk('marker')->put($this->slug.'/config.yaml', $config);
        Storage::disk('marker')->put($this->slug.'/post.md', "# {$this->title}\n\n");
    }

    /**
     * Get the slug for the post.
     */
    public function getSlug(): string
    {
        $convertedTitle = strtr($this->title, [
            'Æ' => 'ae',
            'Ø' => 'oe',
            'Å' => 'aa',
            'æ' => 'ae',
            'ø' => 'oe',
            'å' => 'aa',
        ]);

        return (new SlugNormalizer())->normalize($convertedTitle);
    }
}
