<?php

namespace Justfire\Util\HtmlStructure\Form;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Attrs;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\DefaultConstruct;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\DefaultValue;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Events;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\FormOrigin;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\LabelWidth;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Options;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Placeholder;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Validate;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemCascaderThemeInterface;
use Justfire\Util\HtmlStructure\Theme\Theme;

/**
 * Class FormItemCascader
 */
class FormItemCascader extends AbstractFormItem implements FormItemInterface
{
    use DefaultConstruct, DefaultValue, Placeholder, Options, LabelWidth, FormOrigin, Events, Attrs,Validate;

    /**
     * @var true
     */
    protected bool $closeAfterSelection = false;
    /**
     * @var true
     */
    private bool $isPanel = false;

    public function render(string $theme = null): AbstractHtmlElement
    {
        return Theme::getRenderer(FormItemCascaderThemeInterface::class, $theme)->render($this);
    }

    /**
     * 转为面板模式
     *
     * @return $this
     */
    public function toPanel(): static
    {
        $this->isPanel = true;

        return $this;
    }

    /**
     * 选择后即关闭
     *
     * @return $this
     */
    public function closeAfterSelection(): static
    {
        $this->closeAfterSelection = true;

        return $this;
    }

    public function isPanel(): bool
    {
        return $this->isPanel;
    }
}