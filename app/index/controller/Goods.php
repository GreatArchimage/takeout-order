<?php
declare (strict_types = 1);

namespace app\index\controller;

use app\admin\controller\Base;
use think\facade\Db;
use think\facade\Validate;
use think\Request;

class Goods extends Base
{
    public function read($id){
        if (!Validate::isInteger($id)){
            return  $this->create([],'id类型错误',400);
        }
        $data=Db::name('goods')->where('id',$id)->find();
        if (empty($data)){
            return $this->create([],'无数据',204);
        }else{
            return $this->create($data,'查询成功');
        }
    }

    public function purchase(Request $request){
        $data = $request->param();
        $row=Db::name('orders')->insert($data);
        if (empty($row)){
            return $this->create($data,'下单失败！',400);
        }else{
            return $this->create($data,'下单成功！',200);
        }
    }

}
