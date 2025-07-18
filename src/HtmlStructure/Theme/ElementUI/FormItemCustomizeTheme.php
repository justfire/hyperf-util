<?php

namespace Justfire\Util\HtmlStructure\Theme\ElementUI;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlElement\ElementType\TextCharacters;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemCustomize;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemCustomizeThemeInterface;

/**
 * Class FormItemCustomizeTheme
 */
class FormItemCustomizeTheme extends AbstractFormItemTheme implements FormItemCustomizeThemeInterface
{
    /**
     * @param FormItemAttrGetter|FormItemCustomize $formItem
     *
     * @return AbstractHtmlElement
     */
    public function renderFormItem($formItem): AbstractHtmlElement
    {
        if ($formItem->getLabel()) {
            $element = $this->getBaseEl($formItem)->append($formItem->getElement());
        }else{
            $element = El::get($formItem->getElement());
            if ($element instanceof TextCharacters) {
                $element = El::fromCode('<el-text style="line-height: 30px;display: inline-block;margin-bottom: 10px;margin-left: 10px"></el-text>')->append($element);
            }
        }

        if ($formItem->getWhen()){
            $element->setAttr('v-if', $formItem->getWhen());
        }
        if ($attrs = $formItem->getVAttrs()){
            if (isset($attrs['style'])) {
                $element->setAttr('style', $element->getAttr('style') . ';' . $attrs['style']);
                unset($attrs['style']);
            }
            $attrs and $element->setAttrs($attrs);
        }

        return $element;
    }
}