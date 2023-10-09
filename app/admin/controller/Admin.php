<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\Request;
use app\admin\model\Admin as AdminModel;
use think\facade\Validate;
use app\admin\validate\Admin as AdminValidate;
use think\exception\ValidateException;

class Admin extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        //
        $keywords=$request->param("keywords")?:"";
        $limit=(int)$request->param("pageSize")?:5;
        $page=(int)$request->param("page")?:1;

        if($keywords==""){
            $data=AdminModel::field('id,username,access')->select();
            $res=AdminModel::limit($limit)->page($page)->select();
        }else{
            $data=AdminModel::where('username','like',"%{$keywords}%");
            $res=AdminModel::where('username','like',"%{$keywords}%")->limit($limit)->page($page)->select();
        }

        $total=$data->count();
        if (empty($data)){
            return $this->create($data,'没有查到数据',204);

        }else{
            $data=["total"=>$total,"data"=>$res];
            return $this->create($data,'查询成功!',200);
        }
    }


    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data=$request->param();
        try {
            validate(AdminValidate::class)->check($data);
        }catch (ValidateException $exception){
            return $exception->getError();
        }
        $data['password']=md5($data['password']);
        $id=AdminModel::create($data)->getData('id');
        if (empty($id)){
            return $this->create($data,'添加失败！',400);
        }else{
            return $this->create($data,'添加成功！',200);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
        if (!Validate::isInteger($id)){
            return  $this->create([],'id类型错误',400);
        }
        $data=AdminModel::field('id,username,password')->find($id);
        if (empty($data)){
            return $this->create([],'无数据',204);
        }else{
            return $this->create($data,'查询成功');
        }
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request)
    {
        $data = $request->param();
        $data['password'] = md5($data['password']);
        $res = AdminModel::update($data);
        if($res){
            return $this->create([],"更新成功！");
        }else{
            return $this->create([],"更新失败！",204);
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
            AdminModel::find($id)->delete();
            return $this->create([],'删除成功',200);
        }catch (\Error $e){
            return $this->create([],'删除失败或无数据被删除',400);
        }
    }
}
