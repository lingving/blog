<?php
namespace app\index\validate;

use think\Validate;

class Comment extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:100|unique:comment',
        'email'  =>  'require',
    
    ];
    
     protected $message  =   [
        'name.require' => '名称不能为空',
        'name.unique' =>'名称不能重复',
        'name.max' =>'名称不能大于100',
        'email.require'=>'邮箱不能为空',
    ];
}