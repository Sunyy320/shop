<?php
namespace Home\Controller;
use Think\Controller;
class PersonController extends BaseController{

    //展示我的主页面
    public function index(){
        $per=M("Person");
        $where['per_studentid']=session("per_studentid");
        $arr=$per->field("per_name,per_studentid,per_img")->where($where)->find();

        $this->assign("arr",$arr);
        $this->display();
    }

    //个人信息展示,不可以修改
    public function perInfo(){
        $per=M("Person");
        $where['per_studentid']=session("per_studentid");
        $arr=$per->field("per_name,per_studentid,per_marjor,per_class")->where($where)->find();

        $this->assign("arr",$arr);
        $this->display();
    }
}