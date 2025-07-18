<?php

namespace Justfire\Util\HtmlStructure\Theme\ElementUI;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Layout;
use Justfire\Util\HtmlStructure\Theme\Interfaces\LayoutThemeInterface;

/**
 * Class LayoutTheme
 */
class LayoutTheme implements LayoutThemeInterface
{
    /**
     * @param Layout $layout
     *
     * @return AbstractHtmlElement
     */
    public function render(Layout $layout): AbstractHtmlElement
    {
        $el = El::double('el-row')->setAttrs($layout->getAttrs());

        foreach ($layout->getCols() as ['base' => $attrs, 'content' => $content]) {
            if (is_int($attrs)){
                $attrs = [':span' => $attrs];
            }
            $el->append(El::double('el-col')->setAttrs($attrs)->append($content));
        }

        return $el;
    }
}