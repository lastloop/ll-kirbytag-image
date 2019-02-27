<?php

$original = Kirby\Text\KirbyTag::$types['image'];

Kirby::plugin('lastloop/ll-kirbytag-image', [
    'options' => [
        'imageSizes' => [320, 640, 960, 1280]
    ],
    'tags' => [
        'image' => [
            'attr' => [
                'alt',
                'caption',
                'class',
                'height',
                'imgclass',
                'link',
                'linkclass',
                'rel',
                'target',
                'text',
                'title',
                'width'
            ],
            'html' => function ($tag) use ($original) {
                $srcset = [];
                $imageSizes = option('ll.kirbytag.image.sizes');

                $img = $tag->parent()->file($tag->image);
                foreach ($imageSizes as $imageSize) {
                    if ($img->width() < $imageSize) {
                        continue;
                    }
                    $imageResized = $img->resize($imageSize);
                    $srcset[] = $imageResized->url() . ' ' . $imageResized->width() . 'w';
                };
                $sizes = $tag->width;
                $newTag = ($original['html'])($tag);
                $newTag = str_replace('<img', '<img class="responsively-lazy" sizes="100vw" data-srcset="' . implode(', ', $srcset) . '"' . 'srcset="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="', $newTag);
                return $newTag;
            }
        ]
    ]
]);
