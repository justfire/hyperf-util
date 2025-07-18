<?php
/**
 * datetime: 2023/6/3 23:16
 **/

namespace Justfire\Util\HtmlStructure\Theme\ElementUI;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemHidden;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemHiddenThemeInterface;

class FormItemHiddenTheme extends AbstractFormItemTheme implements FormItemHiddenThemeInterface
{
    /**
     * @param FormItemHidden|FormItemAttrGetter $formItem
     *
     * @return AbstractHtmlElement
     * @date 2023/6/4
     */
    public function renderFormItem($formItem): AbstractHtmlElement
    {
        return El::fictitious();
    }
}