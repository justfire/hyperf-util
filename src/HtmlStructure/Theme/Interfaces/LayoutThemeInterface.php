<?php

namespace Justfire\Util\HtmlStructure\Theme\Interfaces;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Layout;

/**
 * Interface LayoutThemeInterface
 */
interface LayoutThemeInterface
{
    public function render(Layout $layout): AbstractHtmlElement;
}