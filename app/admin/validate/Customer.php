<?php
declare (strict_types = 1);

namespace app\admin\validate;

use think\Validate;

class Customer extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'username|用户名'=>'require|chsDash|unique:customer',
        'password|密码'=>'require|min:4',
        'phone|手机号'=>'require|number',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [];
}
