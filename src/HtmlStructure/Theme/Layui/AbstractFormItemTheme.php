<?php

namespace Justfire\Util\HtmlStructure\Theme\Layui;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemInterface;

/**
 * Class AbstractFormItemTheme
 */
abstract class AbstractFormItemTheme
{
    public function getBaseEl(FormItemInterface|FormItemAttrGetter $formItem): AbstractHtmlElement
    {
        $el = El::double('div')->addClass('layui-form-item');

        if ($formItem->getLabel()) {
            $labelEl = El::double('div')->addClass('layui-form-label')->append($formItem->getLabel());

            $el->append($labelEl);
        }

        return $el;
    }


    public function getVModel(FormItemInterface|FormItemAttrGetter $formItem): ?string
    {
        return $formItem->getName() ? implode('.', array_filter([$formItem->getFormModel(), $formItem->getName()])) : null;
    }
}