<?php
declare (strict_types = 1);

namespace app\index\controller;

use app\admin\controller\Base;
use think\facade\Db;
use think\facade\Validate;
use think\Request;

class Orders extends Base
{
    public function delete($id)
    {
        //
        if (!Validate::isInteger($id)){
            return  $this->create([],'id类型错误',400);
        }
        try{
            Db::name('orders')->where('id',$id)->delete();
            return $this->create([],'删除成功');
        }catch (\Error $e){
            return $this->create([],'删除失败或无数据被删除',400);
        }
    }

    public function pay($id)
    {
        if (!Validate::isInteger($id)){
            return  $this->create([],'id类型错误',400);
        }
        $res=Db::name('orders')
            ->save(['id' => $id, 'state' => '待送达']);
        if($res){
            return $this->create([],"操作成功！");
        }else{
            return $this->create([],"操作失败！",204);
        }
    }
}
