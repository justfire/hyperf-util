<?php
/**
 * datetime: 2023/6/1 23:30
 **/

namespace Justfire\Util\HtmlStructure\Html\JsTheme\Interfaces;

use Justfire\Util\HtmlStructure\Html\Js\Window;

interface WindowThemeInterface
{
    public function render(Window $window): string;
}