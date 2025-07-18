<?php
/**
 * datetime: 2023/6/3 23:15
 **/

namespace Justfire\Util\HtmlStructure\Theme\Interfaces;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemDatetime;
use Justfire\Util\HtmlStructure\Form\FormItemUpload;

interface FormItemUploadThemeInterface
{
    public function render(FormItemUpload|FormItemAttrGetter $formItemUpload): AbstractHtmlElement;
}