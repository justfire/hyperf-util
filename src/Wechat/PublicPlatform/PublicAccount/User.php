<?php

namespace Justfire\Util\Wechat\PublicPlatform\PublicAccount;

use Justfire\Util\Wechat\Config;
use Justfire\Util\Wechat\Execption\WechatException;
use Justfire\Util\Wechat\PublicPlatform\AccessToken;
use Justfire\Util\Wechat\Request;
use Justfire\Util\Wechat\Response;

/**
 * Class User
 */
class User
{
    public function __construct(protected Config $config){}

    /**
     * 获取用户信息
     *
     * @param $openid   string  用户的openid
     *
     * @return Response
     * @throws WechatException|\Psr\SimpleCache\InvalidArgumentException
     */
    public function getInfo(string $openid = ''): Response
    {
        $requestUrl = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=%s&openid=%s&lang=zh_CN';
        $requestUrl = sprintf($requestUrl, AccessToken::get($this->config), $openid);

        return Request::get($requestUrl);
    }
}