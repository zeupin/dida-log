<?php
/**
 * Dida Framework  -- PHP轻量级快速开发框架
 * 版权所有 (c) 上海宙品信息科技有限公司
 *
 * 官网: <https://github.com/zeupin/dida>
 * Gitee: <https://gitee.com/zeupin/dida>
 */
namespace Dida\Log;

use \Psr\Log\LoggerInterface;

/**
 * Logger
 */
abstract class Logger implements LoggerInterface
{
    /**
     * 版本号
     */
    const VERSION = '20191223';


    /**
     * 初始化
     *
     * @param $conf   初始化的配置项
     */
    abstract public function init(array $conf);
}
