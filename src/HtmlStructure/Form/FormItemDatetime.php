<?php
/**
 * datetime: 2023/6/3 2:47
 **/

namespace Justfire\Util\HtmlStructure\Form;

use JetBrains\PhpStorm\ExpectedValues;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Attrs;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\DefaultConstruct;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\DefaultValue;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Events;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\FormOrigin;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\LabelWidth;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Placeholder;
use Justfire\Util\HtmlStructure\Form\ItemAttrs\Validate;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemDatetimeThemeInterface;
use Justfire\Util\HtmlStructure\Theme\Theme;

/**
 * Class FormItemText
 *
 * @package Justfire\Util\HtmlStructure\Form
 * @date    2023/6/3
 */
class FormItemDatetime extends AbstractFormItem implements FormItemInterface
{
    use DefaultConstruct, DefaultValue, Placeholder, LabelWidth, FormOrigin, Events, Attrs, Validate;

    public function render(string $theme = null): AbstractHtmlElement
    {
        return Theme::getRenderer(FormItemDatetimeThemeInterface::class, $theme)->render($this);
    }

    /**
     * 时间类型
     *
     * @param string $type
     *
     * @return FormItemDatetime
     */
    public function setTimeType(#[ExpectedValues(['date', 'dates', 'datetime', 'month', 'year', 'week', 'datetimerange', 'daterange', 'monthrange'])] string $type): FormItemDatetime
    {
        $this->setVAttrs('type', $type);
        if (in_array($type, ['date', 'dates', 'daterange'])) {
            $this->valueFormat('YYYY-MM-DD');
            $this->format('YYYY-MM-DD');
        }

        return $this;
    }

    /**
     * 显示格式
     *
     * @param string $format YYYY-MM-DD  HH:mm:ss
     *
     * @return $this
     */
    public function format(string $format): static
    {
        $this->setVAttrs('format', $format);

        return $this;
    }

    /**
     * 传输值格式
     *
     * @param string $format YYYY-MM-DD  HH:mm:ss
     *
     * @return $this
     */
    public function valueFormat(string $format = "YYYY-MM-DD HH:mm:ss"): static
    {
        $this->setVAttrs('value-format', $format);

        return $this;
    }
}