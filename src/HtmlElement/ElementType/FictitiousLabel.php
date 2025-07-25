<?php
/**
 * datetime: 2023/5/6 1:20
 **/

namespace Justfire\Util\HtmlElement\ElementType;

/**
 * 虚拟标签
 *
 * Class FictitiousLabel
 *
 * @package Justfire\Util\HtmlElement
 * @date    2023/5/6
 */
class FictitiousLabel extends DoubleLabel
{
    public function __construct() { parent::__construct(''); }

    public function toHtml(): string
    {
        return implode($this->getChildren());
    }
}