<?php

namespace Justfire\Util\HtmlStructure\Html\JsTheme;

use Justfire\Util\HtmlStructure\Html\Html;
use Justfire\Util\HtmlStructure\Theme\Theme;

/**
 * Class JsTheme
 */
class JsTheme
{
    /**
     * @template Render
     *
     * @param string|Render $interface
     * @param string|null $theme
     *
     * @return Render|string
     */
    public static function getTheme(mixed $interface, string $theme = null)
    {
        $theme = $theme === null ? Html::theme() : $theme;
        $theme = in_array($theme, Theme::AVAILABLE_THEME) ? $theme : Theme::DEFAULT_THEME;

        $themClass = preg_replace('/Interfaces/', $theme, $interface);
        $themClass = preg_replace('/Interface$/', '', $themClass);

        return $themClass;
    }
}