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
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Options;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Placeholder;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Validate;
use Justfire\Util\HtmlStructure\Html\Js\JsFunc;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemTextThemeInterface;
use Justfire\Util\HtmlStructure\Theme\Theme;

/**
 * Class FormItemText
 *
 * @package Justfire\Util\HtmlStructure\Form
 * @date    2023/6/3
 */
class FormItemText extends AbstractFormItem implements FormItemInterface
{
    use DefaultConstruct, DefaultValue, Options, Placeholder, LabelWidth, FormOrigin, Events, Attrs, Validate;

    protected string|JsFunc $autoCompleteHandle = '';
    protected \Stringable|string $autoCompleteFormat = '';
    /**
     * @var int|null
     */
    public ?int $numberPrecision = null;

    public function render(string $theme = null): AbstractHtmlElement
    {
        return Theme::getRenderer(FormItemTextThemeInterface::class, $theme)->render($this);
    }

    /**
     * 设置为自动完成
     *
     * @param string|array|JsFunc $complete 字符串：远程，数组: 搜索value [[value => 1]], JsFunc: 自定义搜索
     * @param \Stringable|string  $format  自定义模板, 例： <template #default="{ item }">{{item.value}}</template
     *
     * @return FormItemText
     */
    public function autoComplete(string|array|JsFunc $complete, \Stringable|string $format = ''): static
    {
        is_array($complete)
            ? $this->options($complete)
            : $this->autoCompleteHandle = $complete;

        $this->autoCompleteFormat = $format;

        return $this;
    }

    /**
     * 转为密码
     *
     * @return FormItemText
     */
    public function toPassword(): static
    {
        $this->setVAttrs(['type' => 'password', 'show-password' => '']);

        return $this;
    }

    /**
     * @param int $precision 精度, 0表示整数
     *
     * @return $this
     */
    public function toNumber(int $precision = 0): static
    {
        $this->numberPrecision = $precision;

        return $this;
    }

    public function isNumber(): bool
    {
        return $this->numberPrecision !== null;
    }

    public function getNumberPrecision(): ?int
    {
        return $this->numberPrecision;
    }
}