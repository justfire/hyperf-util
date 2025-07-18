<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Justfire\Util;

use Justfire\Util\Attributes\StaticCallAttribute;
use Justfire\Util\Tool\BaiduFanYi;
use Justfire\Util\Tool\Ciphertext;
use Justfire\Util\Tool\ClassProxy;
use Justfire\Util\Tool\Dir;
use Justfire\Util\Tool\Excel;
use Justfire\Util\Tool\Excel\XlsWriter;
use Justfire\Util\Tool\HtmlDocument;
use Justfire\Util\Tool\JWT;
use Justfire\Util\Tool\Lock;
use Justfire\Util\Tool\Nickname;
use Justfire\Util\Tool\Random;
use Justfire\Util\Tool\RemoteResourceDownload;
use Justfire\Util\Tool\SensitiveWord;
use Justfire\Util\Tool\Tree;
use Justfire\Util\Tool\Url;

/**
 * Class Tool.
 * @method static Tree tree(array $data, bool $currentIsTreeData = false)
 * @method static RemoteResourceDownload download()
 * @method static HtmlDocument dom(string $tag = '', bool $isASingleLabel = false)
 * @method static HtmlDocument stringToDom(string $htmlCode)
 * @method static BaiduFanYi baiduFanYi(string $text)
 * @method static JWT jwt(array $config = [])
 * @method static Dir dir(string $dir)
 * @method static Nickname nickname()
 * @method static ClassProxy classProxy(object $class)
 * @method static Url url(?string $url = null)
 * @method static SensitiveWord SensitiveWord(string ...$text)
 * @method static Ciphertext ciphertext(string $secret)
 * @method static Random random(?string $prefix = null)
 * @method static Excel\ExcelInterface xls(array|string $filepath)
 * @method static Lock lock(string $key, int $ttl = 5, int $waitTime = 0)
 *
 * @date 2022/2/20
 */
#[StaticCallAttribute('download', RemoteResourceDownload::class)]
#[StaticCallAttribute('dom', HtmlDocument::class)]
#[StaticCallAttribute('stringToDom', HtmlDocument::class, 'fromCode')]
#[StaticCallAttribute('baiduFanYi', BaiduFanYi::class)]
#[StaticCallAttribute('jwt', JWT::class)]
#[StaticCallAttribute('xls', Excel::class, 'getHandler')]
class JustfireTool extends StaticCall
{
    /**
     * @date 2022/2/20
     */
    protected static function getClassFullyQualifiedName(string $shortClassName): string
    {
        return "Justfire\\Util\\Tool\\{$shortClassName}";
    }
}
