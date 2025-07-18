<?php

namespace Justfire\Util\HtmlStructure\Theme\Layui;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemSelect;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemSelectThemeInterface;

/**
 * Class FormItemSelectTheme
 */
class FormItemSelectTheme extends AbstractFormItemTheme implements FormItemSelectThemeInterface
{
    /**
     * @param FormItemSelect|FormItemAttrGetter $formItemSelect
     *
     * @return AbstractHtmlElement
     */
    public function render(FormItemSelect|FormItemAttrGetter $formItemSelect): AbstractHtmlElement
    {
        $el = $this->getBaseEl($formItemSelect);

        $inputBox = El::double('div')->addClass('layui-input-block');

        if (!$filter = $formItemSelect->getOptionsVarName()) {
            mt_srand();
            $filter = $formItemSelect->getName() . 'Rand' .  mt_rand(1, 999);
        }

        $select = El::double('select')->setAttrs([
            'lay-search' => '',
            'name'       => $formItemSelect->getName(),
            'lay-filter' => $filter
        ]);

        $options = [El::double('option')->setAttr('value', '')];

        foreach ($formItemSelect->getOptions() as ['value' => $value, 'label' => $label]) {
            $options[] = El::double('option')->setAttr('value', $value)->append(El::text($label));
        }

        $select->append(...$options);

        return $el->append($inputBox->append($select));
    }
}