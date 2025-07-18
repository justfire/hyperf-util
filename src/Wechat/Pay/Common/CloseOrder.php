<?php

namespace Justfire\Util\Wechat\Pay\Common;

use Justfire\Util\Wechat\Config;
use Justfire\Util\Wechat\Execption\WechatException;
use Justfire\Util\Wechat\Request;
use Justfire\Util\Wechat\Response;
use Justfire\Util\Wechat\Tool;

/**
 * 关闭订单
 *
 * Class CloseOrder
 */
class CloseOrder
{
    final const HOST = 'https://api.mch.weixin.qq.com/v3/pay/transactions/out-trade-no/{out_trade_no}/close';

    public function __construct(private readonly Config $config)
    {

    }

    /**
     * @param string $out_trade_no
     *
     * @return Response
     * @throws WechatException
     */
    public function request(string $out_trade_no): Response
    {
        $url = strtr(self::HOST, ['{out_trade_no}' => $out_trade_no]);

        $data = [
            'mch_id' => $this->config->mch_id
        ];

        $sign = Tool::config($this->config)->v3Sign($url, $data, 'POST');

        return Request::postV3($url, $data, $sign);
    }
}
