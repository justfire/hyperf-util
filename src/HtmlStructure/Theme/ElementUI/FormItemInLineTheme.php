<?php
/**
 * datetime: 2023/6/3 23:16
 **/

namespace Justfire\Util\HtmlStructure\Theme\ElementUI;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Form\FormItemInLine;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemIconThemeInterface;

class FormItemInLineTheme extends AbstractFormItemTheme implements FormItemIconThemeInterface
{
    /**
     * @param FormItemInLine|FormItemAttrGetter $formItem
     *
     * @return AbstractHtmlElement
     * @date 2023/6/4
     */
    public function renderFormItem($formItem): AbstractHtmlElement
    {
        $el = El::double('el-form-item')->setAttr('label-width', 0);

        $children  = $formItem->getChildren();
        $col       = $this->colCalc($children);

        foreach ($children as $child) {
            $el->append($child->col($child->getCol() ?: $col)->render("ElementUI"));
        }

        return $el;
    }

    /**
     * @param array $children
     *
     * @return int
     */
    private function colCalc(array $children): int
    {
        $total      = 24;
        $waitColumn = 0;

        foreach ($children as $child) {
            if ($col = $child->getCol()) {
                $total -= $col;
            }else{
                $waitColumn++;
            }
        }

        return $waitColumn ? (int)floor($total / $waitColumn) : $total;
    }
}