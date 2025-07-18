<?php
/**
 * datetime: 2023/6/3 2:47
 **/

namespace Justfire\Util\HtmlStructure\Form;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Attrs;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\DefaultConstruct;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\DefaultValue;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Events;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\FormOrigin;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\LabelWidth;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Placeholder;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Validate;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemTextareaThemeInterface;
use Justfire\Util\HtmlStructure\Theme\Theme;

/**
 * Class FormItemText
 *
 * @package Justfire\Util\HtmlStructure\Form
 * @date    2023/6/3
 */
class FormItemTextarea extends AbstractFormItem implements FormItemInterface
{
    use DefaultConstruct, DefaultValue, Placeholder, LabelWidth, FormOrigin, Events, Attrs, Validate;

    protected array $autocomplete;

    public function render(string $theme = null): AbstractHtmlElement
    {
        return Theme::getRenderer(FormItemTextareaThemeInterface::class, $theme)->render($this);
    }

    /**
     * @param array|string                    $data
     * @param AbstractHtmlElement|string|null $template
     *
     * @return $this
     */
    public function setAutoComplete(array|string $data, AbstractHtmlElement|string $template = null): static
    {
        $this->autocomplete = compact('data', 'template');

        return $this;
    }
}