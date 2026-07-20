<?php

/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        'defaults' => [
            'title' => 'LM Workshop',
            'titleBefore' => false,
            'description' => 'Reliable engineering support for marine, industrial and commercial operations across the Maldives. Engineering You Can Count On.',
            'separator' => ' — ',
            'keywords' => [
                'LM Workshop',
                'LM Workshop Maldives',
                'LM Workshop Malé',
                'LMWorkshop',
                'engineering Maldives',
                'marine engineering Maldives',
                'power systems Maldives',
                'industrial maintenance Maldives',
                'fabrication Maldives',
                'LITUS Maldives',
            ],
            'canonical' => 'current',
            'robots' => 'index, follow',
        ],
        'webmaster_tags' => [
            'google' => null,
            'bing' => null,
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],
        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        'defaults' => [
            'title' => 'LM Workshop — Engineering You Can Count On',
            'description' => 'Reliable engineering support for marine, industrial and commercial operations across the Maldives.',
            'url' => null,
            'type' => 'website',
            'site_name' => 'LM Workshop',
            'images' => [],
        ],
    ],
    'twitter' => [
        'defaults' => [
            'card' => 'summary_large_image',
        ],
    ],
    'json-ld' => [
        'defaults' => [
            'title' => 'LM Workshop',
            'description' => 'Reliable engineering support for marine, industrial and commercial operations across the Maldives.',
            'url' => 'current',
            'type' => 'WebPage',
            'images' => [],
        ],
    ],
];
