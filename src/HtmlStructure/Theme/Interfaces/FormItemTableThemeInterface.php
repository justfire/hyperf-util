<?php

namespace Justfire\Util\HtmlStructure\Theme\Interfaces;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemTable;

/**
 * Interface FormItemSubmitThemeInterface
 */
interface FormItemTableThemeInterface
{
    public function render(FormItemTable|FormItemAttrGetter $formItemTable): AbstractHtmlElement;
}