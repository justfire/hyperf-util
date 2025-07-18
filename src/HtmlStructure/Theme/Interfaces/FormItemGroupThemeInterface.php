<?php

namespace Justfire\Util\HtmlStructure\Theme\Interfaces;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemGroup;

/**
 * Interface FormItemSubmitThemeInterface
 */
interface FormItemGroupThemeInterface
{
    public function render(FormItemGroup|FormItemAttrGetter $formItemGroup): AbstractHtmlElement;
}