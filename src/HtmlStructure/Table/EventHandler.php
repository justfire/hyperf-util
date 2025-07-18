<?php
/**
 * datetime: 2023/5/29 23:20
 **/

namespace Justfire\Util\HtmlStructure\Table;
use JetBrains\PhpStorm\Language;
use Justfire\Util\HtmlElement\El;
use Justfire\Util\HtmlElement\ElementType\AbstractHtmlElement;
use Justfire\Util\HtmlStructure\Html\Js\Axios;
use Justfire\Util\HtmlStructure\Html\Js\JsCode;
use Justfire\Util\HtmlStructure\Html\Js\JsFunc;
use Justfire\Util\HtmlStructure\Html\Js\Grammar;
use Justfire\Util\HtmlStructure\Html\Js\JsService;
use Justfire\Util\HtmlStructure\Html\Js\Layer;
use Justfire\Util\HtmlStructure\Html\Js\JsVar;
use Justfire\Util\HtmlStructure\Html\Js\Window;

/**
 * table 事件处理
 *
 * Class EventHandler
 *
 * @package Justfire\Util\HtmlStructure\Table
 * @date    2023/5/29
 */
class EventHandler
{
    /**
     * @param string|\Stringable $url
     * @param bool               $isNewTag
     *
     * @return string
     */
    public static function redirect(string|\Stringable $url, bool $isNewTag = false): string
    {
        return $isNewTag ? JsFunc::call("window.open", $url) : JsVar::assign("location.href", $url);
    }

    /**
     * @param string|\Stringable $url
     * @param string             $tableId
     *
     * @return string
     */
    public static function injectSearchRedirectDownload(string|\Stringable $url, string $tableId): string
    {
        return self::redirect(JsFunc::call("urlInjectSearch", $url, $tableId), true);
    }

    public static function get(string|\Stringable $url = '', mixed $data = null, #[Language('JavaScript')] string|\Stringable $successHandler = "console.log(data.data)"): Axios
    {
        $errorMessage   = JsService::message(Grammar::mark("data.msg ? data.msg : '服务器错误'"), 'error');
        $successHandler = JsCode::create($successHandler);

        return Axios::get($url, $data)->success($successHandler)->fail($errorMessage);
    }

    public static function post(string|\Stringable $url = '', mixed $data = null, #[Language('JavaScript')] string|\Stringable $successHandler = "console.log(data.data)"): Axios
    {
        $errorMessage   = JsService::message(Grammar::mark("data.msg ? data.msg : '服务器错误'"), 'error');
        $successHandler = JsCode::create($successHandler);

        return Axios::post($url, $data)->success($successHandler)->fail($errorMessage);
    }

    public static function window(string $title): Window
    {
        return Window::open($title);
    }

    /**
     * @param string|Layer            $title
     * @param string|\Stringable|null $url
     *
     * @return Layer
     */
    public static function layer(string|Layer $title, string|\Stringable $url = null): Layer
    {
        return $title instanceof Layer ? $title : Layer::open([
            'title'   => $title,
            'content' => (string)$url,
            'area'    => ['90%', '90%'],
        ]);
    }
}