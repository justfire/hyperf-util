<?php
/**
 * datetime: 2023/5/27 23:36
 **/

namespace Justfire\Util\HtmlStructure\Theme\Interfaces;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Table\Column;

/**
 * 表格列渲染
 *
 * Interface TableColumnInterface
 *
 * @package Justfire\Util\HtmlStructure\Theme\Interfaces
 * @date    2023/5/27
 */
interface TableColumnThemeInterface
{
    public function render(Column $column): AbstractHtmlElement;
}