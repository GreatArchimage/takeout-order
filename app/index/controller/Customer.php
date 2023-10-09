<?php
declare (strict_types = 1);

namespace app\index\controller;

use app\admin\controller\Base;
use think\facade\Db;
use think\facade\Validate;
use think\Request;
use think\exception\ValidateException;
use app\admin\validate\Customer as CustomerValidate;

class Customer extends Base
{
    public function register(Request $request){
        $data=$request->param();
        try {
            validate(CustomerValidate::class)->check($data);
        }catch (ValidateException $exception){
            return $exception->getError();
        }
        $data['password']=md5($data['password']);
        $row=Db::name('customer')->insert($data);
        if (empty($row)){
            return $this->create($data,'注册失败！',400);
        }else{
            return $this->create($data,'注册成功！',200);
        }
    }

    public function read($id)
    {
        //
        if (!Validate::isInteger($id)){
            return  $this->create([],'id类型错误',400);
        }
        $data=Db::name('customer')->field('id,username,password,phone,gender,address')->find($id);
        if (empty($data)){
            return $this->create([],'无数据',204);
        }else{
            return $this->create($data,'查询成功');
        }
    }

    public function update(Request $request)
    {
        $data = $request->param();
        $data['password'] = md5($data['password']);
        $res = Db::name('customer')->update($data);
        if($res){
            return $this->create([],"更新成功！");
        }else{
            return $this->create([],"更新失败！",204);
        }
    }
}
