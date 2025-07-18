<?php
/**
 * datetime: 2023/6/3 2:47
 **/

namespace Justfire\Util\HtmlStructure\Form;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Attrs;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\DefaultConstruct;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\DefaultValue;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\FormOrigin;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemHiddenThemeInterface;
use Justfire\Util\HtmlStructure\Theme\Theme;

/**
 * Class FormItemText
 *
 * @package Justfire\Util\HtmlStructure\Form
 * @date    2023/6/3
 */
class FormItemHidden extends AbstractFormItem implements FormItemInterface
{
    use DefaultConstruct, DefaultValue,FormOrigin, Attrs;

    public function render(string $theme = null): AbstractHtmlElement
    {
        return Theme::getRenderer(FormItemHiddenThemeInterface::class, $theme)->render($this);
    }

}