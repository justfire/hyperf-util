<?php

namespace Justfire\Util\HtmlStructure\Form;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Attrs;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemCustomizeThemeInterface;
use Justfire\Util\HtmlStructure\Theme\Theme;

/**
 * Class FormItemCustomize
 */
class FormItemCustomize extends AbstractFormItem implements FormItemInterface
{
    use Attrs;

    protected ?string $label = null;

    public function __construct(protected AbstractHtmlElement|string $element)
    {}

    public function render(string $theme = null): AbstractHtmlElement
    {
        return Theme::getRenderer(FormItemCustomizeThemeInterface::class, $theme)->render($this);
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getElement(): AbstractHtmlElement|string
    {
        return $this->element;
    }
}