<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\facade\Db;
use think\Request;
use think\facade\Validate;
use app\admin\model\Orders as OrdersModel;

class Orders extends Base
{
    /**
     * 显示资源列表
     *
     * 返回id，username，goods_name,phone,state,create_time,price,address
     */
    public function index(Request $request)
    {
        $limit=(int)$request->param("pageSize")?:5;
        $page=(int)$request->param("page")?:1;

        $res = OrdersModel::alias('o')->join('customer c', 'o.customer_id = c.id')
            ->join('goods g', 'o.goods_id = g.id')
            ->field('o.id,c.username, c.phone, g.name as goods_name, total_cost, num,create_time, c.address,state')
            ->order('create_time desc')
            ->limit($limit)->page($page)->select();

        $total=$res->count();

        if (empty($res)){
            return $this->create([],'没有查到数据',204);
        }else{
            $data=["total"=>$total,"data"=>$res];
            return $this->create($data,'查询成功!',200);
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        if (!Validate::isInteger($id)){
            return  $this->create([],'id类型错误',400);
        }
        try{
            OrdersModel::find($id)->delete();
            return $this->create([],'删除成功',200);
        }catch (\Error $e){
            return $this->create([],'删除失败或无数据被删除',400);
        }
    }

    public function update(Request $request){
        $id=$request->param('id');
        $state=$request->param('state');
        $res = Db::name('orders')->save(['id' => $id, 'state' => $state]);;
        if($res){
            return $this->create([],"更新成功！");
        }else{
            return $this->create([],"更新失败！",204);
        }
    }
}
