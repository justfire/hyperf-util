<?php

namespace Justfire\Util\HtmlStructure\Theme\Interfaces;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemIcon;

/**
 * Interface FormItemIconThemeInterface
 */
interface FormItemIconThemeInterface
{
    public function render(FormItemIcon|FormItemAttrGetter $formItemIcon):AbstractHtmlElement;
}