<?php
/**
 * datetime: 2023/6/7 0:31
 **/

namespace Justfire\Util\HtmlStructure\Theme\Layui;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Html\Html;
use Justfire\Util\HtmlStructure\Html\Js\Axios;
use Justfire\Util\HtmlStructure\Html\Js\JsCode;
use Justfire\Util\HtmlStructure\Html\Js\JsFunc;
use Justfire\Util\HtmlStructure\Html\Js\Grammar;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemSubmit;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemSubmitThemeInterface;

class FormItemSubmitTheme extends AbstractFormItemTheme implements FormItemSubmitThemeInterface
{

    public function render(FormItemSubmit|FormItemAttrGetter $formItemSubmit): AbstractHtmlElement
    {
        $el = $this->getBaseEl($formItemSubmit);

        $submit = El::double('button')->setAttrs([
            'type'       => 'submit',
            'class'      => 'layui-btn',
            'lay-submit' => '',
            'lay-filter' => $formItemSubmit->getFormModel() . 'Submit',
        ])->append('立即提交');

        $reset = El::double('button')->setAttrs([
            'type'       => 'reset',
            'class'      => 'layui-btn layui-btn-primary',
            'lay-submit' => '',
        ])->append('重置');

        $this->submitEvent($formItemSubmit);

        return $el->append($submit)->append($reset);
    }

    private function submitEvent(FormItemSubmit|FormItemAttrGetter $formItemSubmit): void
    {
        Html::js()->defCodeBlock(
            JsFunc::call('layui.form.on', "submit({$formItemSubmit->getFormModel()}Submit)", JsFunc::arrow(['data'],
                JsCode::create('let dataField = data.field')
                    ->then("dataField = Object.assign({}, {$formItemSubmit->getFormModel()}, dataField)")
                    ->then(
                        Axios::post($formItemSubmit->getUrl(), Grammar::mark('dataField'))
                    )
                    ->then('return false;')
            ))
        );
    }
}