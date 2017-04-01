<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends BaseController {
	
	  public function login()
    {
		/*
        $arr=explode("?",$_SERVER["REQUEST_URI"]);
		//file_put_contents("c:/mylog.log",var_export($arr,true),FILE_APPEND);
        $arr2=explode("=",$arr[1]);
        $code=$arr2[1];
        $auth_token = $this->getToken();

        $userid = $this->getUserId($code,$auth_token);
        $info = $this->getUserInfo($userid,$auth_token);

        if ($this->isExist($info)) {
            $this->redirect('Index/main', '', 1, '页面跳转中...');
        }*/
		
		$this->redirect('Index/main', '', 1, '页面跳转中...');
    }

    public function getToken()
    {
        $appid = "11";
        $sercret = "d9eebab5cffd9eeb";
        $url = "http://api.ticknet.cn/v1/AuthToken?appid=$appid&appSecret=$sercret";
        $res = $this->postCurl2($url, 'get', '');

        if ($res['errno'] == '0') {
            $auth_token = $res['data']['auth_token'];
            return $auth_token;
        } else {
            $this->error("登陆失败T.T2");
        }
    }


    public function getUserId($code,$auth_token)
    {
        $url = "http://api.ticknet.cn/v1/AuthLogin/getUser?auth_token=$auth_token&code=$code";
        $res = $this->postCurl2($url, 'get', '');
        if ($res['errno'] == '0') {
            $userid = $res['data']['userid'];
            return $userid;
        } else {
            $this->error("登陆失败T.T3");
        }
    }

    public function getUserInfo($userid, $auth_token)
    {
        $url = "http://api.ticknet.cn/v1/Users/$userid?auth_token=$auth_token";
        $res = $this->postCurl2($url, 'get', '');
        if ($res['errno'] == '0') {
            return $res['data'];
        } else {
            $this->error("登陆失败T.T4");
        }
    }

    public function isExist($info)
    {
        if (!isset($_SESSION['per_studentid'])) {
			$person=M("Person");
				$where['per_studentid']=$info['userid'];
				$count=$person->where($where)->count();
				if($count==0){
					$where['per_name']=$info['name'];
					$where['per_marjor']=$info['college'];
					$where['per_class']=$info['class'];
					$where['per_img']=$info['avatar'];
					$person->data($where)->add();
				}
				session("per_studentid",$info['userid']);
          return true;
        }
    }

    public function postCurl2($url, $type, $data)
    {
        //初始化
        $ch = curl_init();
        //设置选项，包括URL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($type == "post") {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        //执行并获取HTML文档内容
        $output = curl_exec($ch);
        if (curl_errno($ch)) {
            print curl_error($ch);
        }
        curl_close($ch);
        return json_decode($output, true);
    }


    public function index()
    {
        $url = "http://api.ticknet.cn/v1/AuthLogin?redir_url=http://syy.test.ticknet.cn/shop/home/login/login";
        $html = "<!DOCTYPE html><html lang=\"en\"><head><script>location.href= \"$url\";</script></head></html>";
        exit($html);
        $this->display();

    }



}