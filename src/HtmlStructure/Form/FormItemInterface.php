<?php
/**
 * datetime: 2023/6/3 2:35
 **/

namespace Justfire\Util\HtmlStructure\Form;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;

interface FormItemInterface
{
    public function render(string $theme = null): AbstractHtmlElement;

}