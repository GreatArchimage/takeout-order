<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\facade\Validate;
use think\Request;
use app\admin\model\Goods as GoodsModel;

class Goods extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        //
        $limit=(int)$request->param("pagesize")?:5;
        $page=(int)$request->param("page")?:1;
        $data = GoodsModel::field('name,price,picture,category')->select();
        $total = $data->count();
        $res = GoodsModel::limit($limit)->page($page)->select();
        if(empty($data)){
            return $this->create([],"没有查询到数据",204);
        }else{
            $data=["total"=>$total,"data"=>$res];
            return $this->create($data,'查询成功');
        }
    }

    public function save(Request $request){
        $data = $request->param();
        $id = GoodsModel::create($data)->getData("id");
        if(empty($id)){
            return $this->create([],"添加商品失败", 400);
        }else{
            return $this->create($data, "添加商品成功");
        }
    }

    public function read($id)
    {
        //
        if (!Validate::isInteger($id)){
            return  $this->create([],'id类型错误',400);
        }
        $data=GoodsModel::find($id);
        if (empty($data)){
            return $this->create([],'无数据',204);
        }else{
            return $this->create($data,'查询成功');
        }
    }

    public function update(Request $request)
    {
        $data = $request->param();
        $res = GoodsModel::update($data);
        if($res){
            return $this->create([],"更新成功！");
        }else{
            return $this->create([],"更新失败！",204);
        }
    }

    public function delete($id)
    {
        //
        if (!Validate::isInteger($id)){
            return  $this->create([],'id类型错误',400);
        }
        try{
            GoodsModel::find($id)->delete();
            return $this->create([],'删除成功',200);
        }catch (\Error $e){
            return $this->create([],'删除失败或无数据被删除',400);
        }
    }

    /*
     * 单文件上传
     */
    public function upload(Request $request){
        $file = $request->file('image');
        $savename = \think\facade\Filesystem::disk('public')->putFile( 'cover', $file);
        if($savename){
            return $this->create("http://127.0.0.1:8000/storage/".$savename,"图片上传成功");
        }else{
            return $this->create([],"图片上传失败",400);
        }
    }


}
