<?php

namespace Justfire\Util\HtmlStructure\Theme\ElementUI;

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
    /**
     * @param FormItemAttrGetter|FormItemRadio $formItem
     *
     * @return AbstractHtmlElement
     */
    public function renderFormItem($formItem): AbstractHtmlElement
    {
        $base = $this->getBaseEl($formItem);

        if (!$optionsVar = $formItem->getOptionsVarName()) {
            mt_srand();
            $optionsVar = $formItem->getName() . 'Rand' .  mt_rand(1, 999);
        }

        $checkbox = El::double('el-radio')->setAttrs([
            'v-for'   => "(item, index) in $optionsVar",
            'v-model' => $this->getVModel($formItem),
            ':value'  => 'item.value',
            ':disabled' => "item.disabled",
        ])->append('{{ item.label }}')
            ->setAttrs($formItem->getVAttrs())
            ->setAttrs($formItem->getOptionsAttrs());

        $this->setOptions($formItem, $optionsVar);

        $this->addEvent($checkbox, $formItem->getEvents(), $formItem->getName());

        return $base->append($checkbox);
    }
}