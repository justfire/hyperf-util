<?php
/**
 * datetime: 2023/5/27 23:58
 **/

namespace Justfire\Util\HtmlStructure\Theme\Interfaces;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Tag;

/**
 * 表格渲染
 *
 * Interface TableInterface
 *
 * @package Justfire\Util\HtmlStructure\Theme\Interfaces
 * @date    2023/5/27
 */
interface TagThemeInterface
{
    public function render(Tag $tag): AbstractHtmlElement;
}