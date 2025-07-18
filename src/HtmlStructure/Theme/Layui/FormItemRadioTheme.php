<?php

namespace Justfire\Util\HtmlStructure\Theme\Layui;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemRadio;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemRadioThemeInterface;

/**
 * Class FormItemSelectThem
 */
class FormItemRadioTheme extends AbstractFormItemTheme implements FormItemRadioThemeInterface
{

    public function render(FormItemRadio|FormItemAttrGetter $formItemRadio): AbstractHtmlElement
    {
        $base = $this->getBaseEl($formItemRadio);
        $inputBox = El::double('div')->addClass('layui-input-block');
        if (!$filter = $formItemRadio->getOptionsVarName()) {
            mt_srand();
            $filter = $formItemRadio->getName() . 'Rand' .  mt_rand(1, 999);
        }
        $radio = [];

        foreach ($formItemRadio->getOptions() as ['value' => $value, 'label' => $label]) {
            $radio[] = El::double('input')->setAttrs([
                'name'       => $formItemRadio->getName(),
                'value'      => $value,
                'title'      => $label,
                'type'       => 'radio',
                'lay-filter' => $filter,
            ]);
        }

        return $base->append($inputBox->append(...$radio));
    }
}