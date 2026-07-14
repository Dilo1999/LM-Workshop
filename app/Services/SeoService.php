<?php

namespace App\Services;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;

class SeoService
{
    protected string $defaultOgImage;

    protected string $siteName;

    /** @var array<int, string> */
    protected array $defaultKeywords;

    public function __construct()
    {
        $this->siteName = config('lm-workshop.brand.name', 'LM Workshop');
        $this->defaultOgImage = $this->resolveAssetUrl((string) config('lm-workshop.images.hero'));
        $this->defaultKeywords = config('seotools.meta.defaults.keywords', []);
    }

    /**
     * Apply SEO meta, Open Graph, Twitter Card and JSON-LD for a public page.
     *
     * @param  array{
     *     meta_title?: string,
     *     meta_description?: string,
     *     keywords?: string[],
     *     og_title?: string,
     *     og_description?: string,
     *     og_image?: string,
     *     twitter_title?: string,
     *     twitter_description?: string,
     *     twitter_image?: string,
     *     canonical?: string,
     *     robots?: string,
     *     type?: string
     * }  $defaults
     */
    public function applyForPage(string $routeName, array $defaults = []): void
    {
        $url = $defaults['canonical'] ?? url()->current();
        $ogImageKey = config("lm-workshop.seo.og_images.{$routeName}");
        $resolvedOgImage = isset($defaults['og_image'])
            ? $this->resolveAssetUrl($defaults['og_image'])
            : ($ogImageKey
                ? $this->resolveAssetUrl((string) config("lm-workshop.images.{$ogImageKey}"))
                : $this->defaultOgImage);

        $metaTitle = $defaults['meta_title'] ?? $this->siteName;
        $metaDesc = $defaults['meta_description']
            ?? config('lm-workshop.brand.description');
        $ogTitle = $defaults['og_title'] ?? $metaTitle;
        $ogDesc = $defaults['og_description'] ?? $metaDesc;
        $twTitle = $defaults['twitter_title'] ?? $ogTitle;
        $twDesc = $defaults['twitter_description'] ?? $ogDesc;
        $twImage = isset($defaults['twitter_image'])
            ? $this->resolveAssetUrl($defaults['twitter_image'])
            : $resolvedOgImage;
        $robots = $defaults['robots'] ?? 'index, follow';
        $keywords = $defaults['keywords'] ?? $this->defaultKeywords;
        $pageType = $defaults['type'] ?? 'website';

        SEOMeta::setTitle($metaTitle, false);
        SEOMeta::setDescription($metaDesc);
        SEOMeta::setCanonical($url);
        SEOMeta::setRobots($robots);
        if (! empty($keywords)) {
            SEOMeta::setKeywords($keywords);
        }

        OpenGraph::setTitle($ogTitle);
        OpenGraph::setDescription($ogDesc);
        OpenGraph::setUrl($url);
        OpenGraph::setType($pageType);
        OpenGraph::setSiteName($this->siteName);
        OpenGraph::addProperty('locale', 'en_MV');
        OpenGraph::addImage($resolvedOgImage, [
            'width' => 1200,
            'height' => 630,
            'alt' => $ogTitle,
        ]);

        TwitterCard::setType('summary_large_image');
        TwitterCard::setTitle($twTitle);
        TwitterCard::setDescription($twDesc);
        TwitterCard::setImage($twImage);
        TwitterCard::setUrl($url);

        JsonLd::setTitle($metaTitle);
        JsonLd::setDescription($metaDesc);
        JsonLd::setType('WebPage');
        JsonLd::setUrl($url);
        JsonLd::addImage($resolvedOgImage);
        JsonLd::addValue('inLanguage', 'en');
        JsonLd::addValue('isPartOf', [
            '@type' => 'WebSite',
            'name' => $this->siteName,
            'url' => url('/'),
        ]);
    }

    protected function resolveAssetUrl(string $path): string
    {
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return str_replace(' ', '%20', $path);
        }

        return str_replace(' ', '%20', asset($path));
    }
}
