<?php

namespace Justfire\Util\Wechat\PublicPlatform\PublicAccount;

use Psr\SimpleCache\InvalidArgumentException;
use Justfire\Util\Wechat\Config;
use Justfire\Util\Wechat\Execption\WechatException;
use Justfire\Util\Wechat\PublicPlatform\AccessToken;
use Justfire\Util\Wechat\PublicPlatform\PublicAccount\Menu\MenuItem;
use Justfire\Util\Wechat\Request;
use Justfire\Util\Wechat\Response;

/**
 * Class Menu
 */
class Menu
{
    private array $menu = [
        'button' => []
    ];

    public function __construct(private readonly Config $config)
    {
    }

    /**
     * 添加菜单
     *
     * @param MenuItem $menuItem
     *
     * @return $this
     */
    public function addMenu(MenuItem $menuItem): static
    {
        $this->menu['button'][] = $menuItem->toArray();

        return $this;
    }

    /**
     * 创建菜单
     *
     * @return Response
     * @throws WechatException
     * @throws InvalidArgumentException
     */
    public function create(): Response
    {
        $createUrl = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=%s';
        $createUrl = sprintf($createUrl, AccessToken::get($this->config));

        return Request::post($createUrl, $this->menu);
    }
}