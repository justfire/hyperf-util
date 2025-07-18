<?php
/**
 * datetime: 2023/6/7 23:21
 **/

namespace Justfire\Util\HtmlStructure\Theme\Interfaces;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemEditor;

interface FormItemEditorThemeInterface
{
    public function render(FormItemEditor|FormItemAttrGetter $formItemEditor): AbstractHtmlElement;
}