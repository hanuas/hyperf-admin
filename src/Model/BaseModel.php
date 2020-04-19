<?php declare (strict_types=1);

namespace Oyhdd\Admin\Model;

use Hyperf\DbConnection\Model\Model;

class BaseModel extends Model
{
    /**
     * status
     */
    const STATUS_DELETED = -1; //删除
    const STATUS_DISABLE = 0;  //未启用
    const STATUS_ENABLE  = 1;  //正常
    public static $status = [
        self::STATUS_DISABLE => '禁用',
        self::STATUS_ENABLE  => '正常'
    ];
}
