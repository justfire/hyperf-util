<?php
/**
 * datetime: 2023/6/3 2:38
 **/

namespace Justfire\Util\HtmlStructure\Theme\Interfaces;

use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form;

/**
 * 表单渲染
 *
 * Interface FormThemeInterface
 *
 * @package Justfire\Util\HtmlStructure\Theme\Interfaces
 * @date    2023/6/3
 */
interface FormThemeInterface
{
    /**
     * @param Form $form
     *
     * @return AbstractHtmlElement
     * @date 2023/6/3
     */
    public function render(Form $form): AbstractHtmlElement;
}