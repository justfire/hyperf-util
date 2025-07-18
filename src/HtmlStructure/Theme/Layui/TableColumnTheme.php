<?php
/**
 * datetime: 2023/5/27 23:39
 **/

namespace Justfire\Util\HtmlStructure\Theme\Layui;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlElement\ElementType\FictitiousLabel;
use Justfire\Util\HtmlStructure\Html\Html;
use Justfire\Util\HtmlStructure\Html\Js\JsFunc;
use Justfire\Util\HtmlStructure\Table\Column;
use Justfire\Util\HtmlStructure\Theme\Interfaces\TableColumnThemeInterface;

/**
 * Class TableColumn
 *
 * @package Justfire\Util\HtmlStructure\Theme\Layui
 * @date    2023/5/27
 */
class TableColumnTheme implements TableColumnThemeInterface
{
    /**
     * @param Column $column
     *
     * @return AbstractHtmlElement
     * @date 2023/5/27
     */
    public function render(Column $column): AbstractHtmlElement
    {
        return new FictitiousLabel();
    }
}