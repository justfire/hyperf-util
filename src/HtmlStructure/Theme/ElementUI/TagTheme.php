<?php

namespace Justfire\Util\HtmlStructure\Theme\ElementUI;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Tag;
use Justfire\Util\HtmlStructure\Theme\Interfaces\TagThemeInterface;

/**
 * Class TagTheme
 */
class TagTheme implements TagThemeInterface
{

    public function render(Tag $tag): AbstractHtmlElement
    {
        $attrs = $tag->getAttrs();
        return El::double('el-tag')
            ->setAttrs($attrs)
            ->setAttr('size', 'small')
            ->setAttr('effect', $attrs['theme'] ?? null)
            ->addClass('ml-2')
            ->append($tag->getContent());
    }
}