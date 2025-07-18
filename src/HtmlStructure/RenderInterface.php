<?php
/**
 * datetime: 2023/5/28 0:38
 **/

namespace Justfire\Util\HtmlStructure;

use JetBrains\PhpStorm\ExpectedValues;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Theme\Theme;

/**
 * 渲染接口
 *
 * Interface RenderInterface
 *
 * @package Justfire\Util\HtmlStructure
 * @date    2023/5/28
 */
interface RenderInterface
{
    public function render(#[ExpectedValues(Theme::AVAILABLE_THEME)] string $theme = null): AbstractHtmlElement;
}