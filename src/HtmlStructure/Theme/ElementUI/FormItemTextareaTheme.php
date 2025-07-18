<?php
/**
 * datetime: 2023/6/3 23:16
 **/

namespace Justfire\Util\HtmlStructure\Theme\ElementUI;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemTextarea;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemTextareaThemeInterface;

class FormItemTextareaTheme extends AbstractFormItemTheme implements FormItemTextareaThemeInterface
{
    /**
     * @param FormItemTextarea|FormItemAttrGetter $formItem
     *
     * @return AbstractHtmlElement
     * @date 2023/6/4
     */
    public function renderFormItem($formItem): AbstractHtmlElement
    {
        $base = $this->getBaseEl($formItem);

        $input = El::double('el-input')->setAttrs([
            'v-model'     => $this->getVModel($formItem),
            'placeholder' => $formItem->getPlaceholder(),
            'type'        => 'textarea',
            ':rows'       => 4
        ])->setAttrs($formItem->getVAttrs());

        $this->addEvent($input, $formItem->getEvents(), $formItem->getName());

        return $base->append($input);
    }
}