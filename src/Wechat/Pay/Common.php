<?php

namespace Justfire\Util\Wechat\Pay;

use Justfire\Util\Wechat\Config;
use Justfire\Util\Wechat\Execption\WechatException;
use Justfire\Util\Wechat\Pay\Common\CloseOrder;
use Justfire\Util\Wechat\Pay\Common\Refund;

/**
 * Class Common
 */
class Common
{

    public function __construct(private Config $config)
    {}

    /**
     * 关闭订单
     *
     * @param string $out_trade_no
     *
     * @return array|void
     * @throws WechatException
     */
    public function closeOrder(string $out_trade_no)
    {
        return (new CloseOrder($this->config))->request($out_trade_no);
    }

    /**
     * 退款
     *
     * @return Refund
     */
    public function refund(): Refund
    {
        return new Refund($this->config);
    }
}
