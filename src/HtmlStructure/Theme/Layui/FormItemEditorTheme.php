<?php
/**
 * datetime: 2023/6/3 23:16
 **/

namespace Justfire\Util\HtmlStructure\Theme\Layui;

use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Html\Html;
use Justfire\Util\HtmlStructure\Html\Js\JsCode;
use Justfire\Util\HtmlStructure\Html\Js\JsFunc;
use Justfire\Util\HtmlStructure\Html\Js\JsVar;
use Justfire\Util\HtmlStructure\Form\FormItemAttrGetter;
use Justfire\Util\HtmlStructure\Form\FormItemEditor;
use Justfire\Util\HtmlStructure\Theme\Interfaces\FormItemEditorThemeInterface;

class FormItemEditorTheme extends AbstractFormItemTheme implements FormItemEditorThemeInterface
{
    /**
     * @param FormItemEditor|FormItemAttrGetter $formItemEditor
     *
     * @return AbstractHtmlElement
     * @date 2023/6/4
     */
    public function render(FormItemEditor|FormItemAttrGetter $formItemEditor): AbstractHtmlElement
    {
        $editorEl = $this->initialize($formItemEditor);
        $baseEl   = $this->getBaseEl($formItemEditor);

        $box = El::double('div')->addClass('layui-input-block');

        return $baseEl->append($box->append($editorEl));
    }

    private function initialize(FormItemEditor|FormItemAttrGetter $formItemEditor): AbstractHtmlElement
    {
        $editorId = 'froala-editor' . $formItemEditor->getName();
        $varName  = 'editor' . $formItemEditor->getName();

        $options = $formItemEditor->getInitOptions();

        $options['events']['contentChanged'] = JsFunc::anonymous([], "{$this->getVModel($formItemEditor)} = $varName.html.get()");

        // 创建编辑器
        Html::js()->defVar($varName, JsFunc::call('new FroalaEditor', "div#{$editorId}",
            $options
            , JsFunc::anonymous([],
                JsCode::create($formItemEditor->getFullScreen() ? "$varName.fullscreen.toggle()" : '')
                    ->then("$varName.html.set(`{$formItemEditor->getDefault()}`)")
            )));

        return El::double('div')->setId($editorId);
    }
}