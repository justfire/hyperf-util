<?php

namespace Justfire\Util\Wechat;

use Justfire\Util\StaticCall;
use Justfire\Util\Wechat\PublicPlatform\PublicAccount\Menu;
use Justfire\Util\Wechat\PublicPlatform\PublicAccount\MessageManger;
use Justfire\Util\Wechat\PublicPlatform\PublicAccount\TemplateMessage;
use Justfire\Util\Wechat\PublicPlatform\PublicAccount\User;

/**
 * 微信公众号
 * @method static MessageManger messageManger(Config $config) 消息管理
 * @method static User user(Config $config) 用户
 * @method static TemplateMessage templateMessage(Config $config) 模板消息
 * @method static Menu menu(Config $config) 菜单
 * @author chenlong<vip_chenlong@163.com>
 * @date   2022/6/24 14:15
 */
class WechatPublic extends StaticCall
{
    /**
     * 获取类的全命名空间
     *
     * @param string $shortClassName
     *
     * @return string
     *
     * @author chenlong<vip_chenlong@163.com>
     * @date   2022/6/24 14:17
     */
    protected static function getClassFullyQualifiedName(string $shortClassName): string
    {
        return sprintf('Justfire\\Util\\Wechat\\PublicPlatform\\PublicAccount\\%s', $shortClassName);
    }
}
