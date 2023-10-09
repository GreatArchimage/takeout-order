<?php
declare (strict_types = 1);

namespace app\index\controller;

use app\admin\controller\Base;
use app\Request;
use think\facade\Db;

class Index extends Base
{

    public function checkUser(Request $request){
        $username= $request->param("username");
        $row=Db::name('user')->where('username', $username)->find();
        if(empty($row))
            return $this->create([],"查询失败", 400);
        else
            return $this->create($row,"查询成功");
    }


    public function login(Request $request){
        $username = $request->param("username");
        $password = $request->param("password");
        $user=Db::name('customer')->where('username', $username)->find();
        if($user){
            if($user['password']= md5($password)){
                return $this->create(['id'=>$user['id']], "登录成功");
            }else{
                return $this->create([], "登录失败", 204);
            }
        }else{
            return $this->create([], '账号不存在', 204);
        }
    }

    public function getGoods(Request $request){
//        $category=$request->param('category')?:'';
//        $data=Db::name('goods')->where('category','=',$category)->select();
        $data=Db::name('goods')->select();
        if (empty($data)){
            return $this->create($data,'没有查到数据',204);
        }else{
            return $this->create($data,'查询成功!',200);
        }
    }

    public function getOrdersList(Request $request)
    {
        $id=(int)$request->param('id');
        $data = Db::name('orders')->alias('o')->join('customer c', 'o.customer_id = c.id')
            ->join('goods g', 'o.goods_id = g.id')
            ->field('o.id, c.phone, g.name as goods_name,create_time, c.address,state,num,total_cost')
            ->where('o.customer_id',$id)
            ->order('create_time desc')
            ->select();

        if (empty($data)){
            return $this->create([],'没有查到数据',204);
        }else{
            return $this->create($data,'查询成功!');
        }
    }
}
