<?php

namespace Justfire\Util\HtmlStructure\Theme\Interfaces;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemSubmit;

/**
 * Interface FormItemSubmitThemeInterface
 */
interface FormItemSubmitThemeInterface
{
    public function render(FormItemSubmit|FormItemAttrGetter $formItemSubmit): AbstractHtmlElement;
}