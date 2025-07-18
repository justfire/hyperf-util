<?php
/**
 * datetime: 2023/6/7 0:14
 **/

namespace Justfire\Util\HtmlStructure\Theme\Layui;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Html\Html;
use Justfire\Util\HtmlStructure\Html\Js\Grammar;
use Justfire\Util\HtmlStructure\Html\Js\Obj;
use Justfire\Util\HtmlStructure\Form;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormThemeInterface;

class FormTheme implements FormThemeInterface
{

    public function render(Form $form): AbstractHtmlElement
    {
        $el = El::double('form')
            ->setAttr('lay-filter', $form->getId())
            ->setId($form->getId())
            ->addClass('layui-form');

        Html::js()->defVar($form->getId(), $form->getDefaults());

        $el->append(...array_map(fn($v) => $v->render('Layui'), $form->getFormItems()));

        Html::js()->defCodeBlock(Obj::use('layui.form')->call('val', $form->getId(), Grammar::mark($form->getId())));

        return $el;
    }
}