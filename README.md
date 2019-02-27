[![Kirby CMS Version 3](https://img.shields.io/badge/Kirby%20CMS-Version%203%2B-brightgreen.svg?style=flat)](https://github.com/getkirby)
# Imagetag with srcset and lazyloading-class

This plugin replaces the default `(image: ...)` tag and adds a srcset and a lazyloading-class. The resulting `<img>` will look similar to this example:

````html
<img class="responsively-lazy"
     sizes="100vw"
     src="1080x720.jpg"
     data-srcset="
     360x270.jpg 360w, 
     640x480.jpg 640w, 
     960x640.jpg 960w,
     1080x720.jpg 1080w"
     srcset="data:image/gif;1x1px-transparent" 
     alt="red, green, blue"
/> 
````



## Installation

[Download the files](https://github.com/lastloop/ll-kirbytag-image/archive/master.zip) and place them inside `/site/plugins/ll-kirbytag-image`.


## Setup

The sizes can be specified in your `site/config/config.php`. The default sizes are shown below:

```php
return [
  'll-kirbytag-image' => [
    320,
    640,
    960, 
    1080
  ]
];
```

## Lazyloading

This plugin is supposed to be used with the [responsively-lazy](https://github.com/ivopetkov/responsively-lazy) script by Ivo Petkov. You have to download and add it to your website. 

## Modification

To use this plugin with or without another script for lazyloading, you will have to change the `$newTag` at the end of the `index.php` file to fit your needs.

````php
$newTag = str_replace('<img', '<img class="responsively-lazy" sizes="100vw" data-srcset="' . implode(', ', $srcset) . '"' . 'srcset="data:image/gif;1x1px-transparent"', $newTag);


````



## License

[MIT](https://opensource.org/licenses/MIT)

## Credits

- [kirby-responsiveimage](https://github.com/Pascalmh/kirby-responsiveimage) by Pascal Küsgen
- [k3-image-tag](https://github.com/rasteiner/k3-image-tag) by Roman Steiner
