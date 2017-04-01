<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/25
 * Time: 14:52
 */
    //	循环找出名字
    function findname(&$res){
        foreach($res as $key=>$val){
            //取出姓名
            $users=M('Users');
            $where['id']=$val['userid'];
            $res2=$users->where($where)->find();
            $res[$key]['username']=$res2['username'];
        }


    }
