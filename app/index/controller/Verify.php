<?php
declare (strict_types = 1);

namespace app\index\controller;
use app\admin\controller\Base;
use app\Request;
use think\captcha\facade\Captcha;

class Verify extends Base
{
    public function index(){
        $captcha = Captcha::createApi();
//        return $captcha;
        if(empty($captcha)){
            return $this->create([], "生成验证码失败", 400);
        }else{
            return $captcha;
        }
    }

    public function checkCaptcha(Request $request){
        $captcha = $request->param("captcha");
        $captchaKey = $request->param("captchaKey");
        if(Captcha::checkApi(strval($captcha),$captchaKey)){
            return $this->create([],"验证失败", 400);
        }else{
            return $this->create($captcha, "验证成功");
        }
    }
}
