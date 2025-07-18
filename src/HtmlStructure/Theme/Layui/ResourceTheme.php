<?php
/**
 * datetime: 2023/5/28 2:58
 **/

namespace Justfire\Util\HtmlStructure\Theme\Layui;

use Justfire\Util\HtmlStructure\Html\Html;
use Justfire\Util\HtmlStructure\Html\StaticResource;
use Justfire\Util\HtmlStructure\Theme\Interfaces\ResourceThemeInterface;

/**
 * Class ThemeResource
 *
 * @package Justfire\Util\HtmlStructure\Theme\Layui
 * @date    2023/5/28
 */
class ResourceTheme implements ResourceThemeInterface
{
    public function load(): void
    {
        // 加载Layui的CDN资源
        Html::css()->load(StaticResource::LAYUI_CSS);
        Html::js()->load(StaticResource::LAYUI_JS);
    }
}