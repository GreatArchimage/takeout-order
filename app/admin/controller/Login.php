<?php
declare (strict_types = 1);

namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use think\Request;

class Login extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $data=$request->param();
        $info=AdminModel::where('username',$data['username'])->find();
        if (empty($info)){
            return  $this->create([],'账号不存在',204);
        }else if(md5($data['password'])!==$info['password']){
            return $this->create([],'账号或密码错误',204);
        }
        return $this->create($info,'登录成功!!!!!');
    }

}
