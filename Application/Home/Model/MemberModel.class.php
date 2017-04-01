<?php
namespace Home\Model;
use Think\Model;


class MemberModel extends Model{
       protected $tableName="member";

    //自动验证
      protected $_validate = array(
          array('user','require','用户名不能为空！'),
          array('user','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
          array('user','checkName',"用户名格式不正确",0,'callback'),
          array('password','require','密码不能为空！'),
          array('password2','password','确认密码不正确',0,'confirm'),
          array('email','email',"邮箱格式不正确",0)

    );

    //自定义验证
    function checkName($username){
        if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$username)){
            return false;
        }else{
            return true;
        }
    }
}