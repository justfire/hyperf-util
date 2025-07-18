<?php
/**
 * datetime: 2023/6/3 23:16
 **/

namespace Justfire\Util\HtmlStructure\Theme\ElementUI;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemIcon;
use Justfire\Util\HtmlStructure\Html\Html;
use Justfire\Util\HtmlStructure\Html\Js\VueComponents\IconSelector;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemIconThemeInterface;

class FormItemIconTheme extends AbstractFormItemTheme implements FormItemIconThemeInterface
{
    /**
     * @param FormItemIcon|FormItemAttrGetter $formItem
     *
     * @return AbstractHtmlElement
     * @date 2023/6/4
     */
    public function renderFormItem($formItem): AbstractHtmlElement
    {
        $base = $this->getBaseEl($formItem);

        $input = El::double('icon-selector')->setAttrs([
            'v-model' => $this->getVModel($formItem),
        ])->setAttrs($formItem->getVAttrs());

        $this->addEvent($input, $formItem->getEvents(), $formItem->getName());

        Html::js()->vue->addComponents(new IconSelector());

        return $base->append($input);
    }
}