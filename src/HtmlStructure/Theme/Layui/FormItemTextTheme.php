<?php
/**
 * datetime: 2023/6/7 0:31
 **/

namespace Justfire\Util\HtmlStructure\Theme\Layui;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemText;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemTextThemeInterface;

class FormItemTextTheme extends AbstractFormItemTheme implements FormItemTextThemeInterface
{

    public function render(FormItemText|FormItemAttrGetter $formItemText): AbstractHtmlElement
    {
        $el = $this->getBaseEl($formItemText);

        $inputBox = El::double('div')->addClass('layui-input-block');

        $input = El::single('input')->setAttrs([
            'type'         => 'text',
            'name'         => $formItemText->getName(),
            'placeholder'  => $formItemText->getPlaceholder(),
            'autocomplete' => 'off',
            'class'        => 'layui-input',
            'value'        => $formItemText->getDefault()
        ]);

        $inputBox->append($input);

        return $el->append($inputBox);
    }
}