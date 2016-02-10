<?php
namespace Gwa\Wordpress\Zero\Module;

use Gwa\Wordpress\WpBridge\Traits\WpBridgeTrait;
use Gwa\Wordpress\Zero\Module\AbstractThemeModule;

class Html5Module extends AbstractThemeModule
{
    use WpBridgeTrait;

    /**
     * Wrap images with figure tag.
     * Courtesy of Interconnectit http://interconnectit.com/2175/how-to-remove-p-tags-from-images-in-wordpress/
     *
     * @param string $content
     *
     * @return string
     */
    public function wrapImgInFigure($content)
    {
        $callback = function ($matches) {
            $img     = $matches[1];
            $pattern = '/class="([^"]+)"/';

            preg_match($pattern, $img, $matches);

            $classes = $matches[1];
            $class   = '';

            if (isset($classes)) {
                $class = ' class="' . $classes . '"';
            }

            return '<figure' . $class . '>' . $img . '</figure>';
        };

        $content = preg_replace_callback('/(<a .*?><img.*?><\/a>|<img.*?>)/s', $callback, $content);

        return $content;
    }

    protected function doInit()
    {
        $this->getWpBridge()->addThemeSupport('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);
    }

    /**
     * Override in concrete subclass.
     *
     * @return array
     */
    protected function getFilterMap()
    {
        return [
            [
                'hooks'  => 'the_content',
                'class'  => $this,
                'method' => 'wrapImgInFigure',
                'prio'   => 30,
                'args'   => 1,
            ],
        ];
    }
}
