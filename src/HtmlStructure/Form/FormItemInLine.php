<?php

namespace Justfire\Util\HtmlStructure\Form;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\DefaultValue;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\FormOrigin;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemInLineThemeInterface;
use Justfire\Util\HtmlStructure\Theme\Theme;

/**
 * Class FormItemLine
 */
class FormItemInLine extends AbstractFormItem implements FormItemInterface
{
    use DefaultValue, FormOrigin;

    /**
     * @var FormItemInterface[]|AbstractFormItem[]|FormItemAttrGetter[]
     */
    protected array $children;

    public function __construct(FormItemInterface ...$children)
    {
        $this->children = $children;
    }

    public function render(string $theme = null): AbstractHtmlElement
    {
        return Theme::getRenderer(FormItemInLineThemeInterface::class, $theme)->render($this);
    }

    public function getChildren(): array
    {
        return array_filter($this->children, fn($children) => !$children->getHide());
    }

    /**
     * @return array
     */
    public function getDefault(): array
    {
        return array_merge(...array_map(function ($v) {
            if ($v->getName()) {
                return [$v->getName() => $v->getDefault()];
            }

            return $v->getDefault();
        }, array_filter($this->getChildren(), fn($v) => !$v instanceof FormItemSubmit && !$v instanceof FormItemCustomize)));
    }


    public function getRules(): array
    {
        return array_merge(...array_map(function ($v) {
            if ($v->getName() && $v->getRules()) {
                return [$v->getName() => $v->getRules()];
            }

            return $v->getRules();
        }, array_filter($this->getChildren(), fn($v) => !$v instanceof FormItemSubmit && !$v instanceof FormItemCustomize)));
    }
}