<?php


namespace app\admin\controller;


use think\Response;

abstract class Base
{
    protected function create($data,string $msg='',int $code=200,string $type='json'){
        $result=[
            'code'=>$code,
            'msg'=>$msg,
            'data'=>$data
        ];
        return Response::create($result,$type);
    }
}