<?php
/*
 * 功能：本系统用于关于交易的相关信息
 * */
namespace Home\Controller;
use Think\Controller;

class MessagesController extends BaseController{



    //保存留言信息
    public function  saveMessages(){
        //file_put_contents("d:/mylog.log",var_export($_POST,true),FILE_APPEND);

        $arr=array(
            'mg_from'=>session("per_studentid"),
            'mg_to'=>$_POST['mg_to'],
            'mg_gdid'=>$_POST['mg_gdid'],
            'mg_cont'=>$_POST['mg_cnt'],
            'mg_time'=> time(),
            'mg_parent'=>'0',
            'mg_isread'=>'0',
        );

        $ms=M("Messages");


        if($id=$ms->create($arr)){
            if($ms->add()>0){
                $per=M("person");
                $where['per_studentid']=session("per_studentid");
                $name=$per->field("per_name")->where($where)->find();
                $arr['per_name']=$name['per_name'];
				//$res=$this->sendReal("有人给你留言啦",$_POST['mg_to']);
                $this->returnAjax (true, "留言成功！", $arr);
            }
        }

        $this->returnAjax ( false, "留言失败！" );
    }


	//微信提醒
	public function sendReal($messages,$toUser){
		$rand=rand(10000000,99999999);
		 $res= $this->postCurl('http://api.ticknet.cn', json_encode(array(
					'appid' => '8',
					'random'  =>  $rand,
					'token' =>  hash('ripemd160', '93nfcab5cffd9eeb' . $rand),
					'action'  => 'SendMessage',
					'userid'  =>$toUser,
					'content'=>$messages
				)));
		return 1;
	}
	
	 public  function postCurl($url, $data) {
    //$header = "Content-type: text/html";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($ch);
		if(curl_errno($ch)){
			print curl_error($ch);
		}
		curl_close($ch);
		return $response;
     }

    //商家回复信息
    public  function replyMess(){
       // file_put_contents("d:/mylog.log",var_export($_POST,true),FILE_APPEND);

        $arr=array(
            'mg_from'=>$_POST['mg_from'],
            'mg_to'=>$_POST['mg_to'],
            'mg_gdid'=>$_POST['mg_gdid'],
            'mg_cont'=>$_POST['mg_cont'],
            'mg_time'=> time(),
            'mg_parent'=>$_POST['mg_id'],
            'mg_isread'=>'0',
        );

        $ms=M("Messages");


        if($id=$ms->create($arr)){
            if($ms->add()>0){
                $where['mg_id']=$_POST['mg_id'];
                $data['mg_isread']='1';
                $ms->where($where)->save($data);
				$res=$this->sendReal("商品主人回复你了",$_POST['mg_to']);
                $this->redirect("Messages/messInfo");
            }
        }

    }


    //用户点开留言板页面
    public function messInfo(){
        $ms=M("Messages");
        //选出发给自己的信息
        $where['mg_to']=session("per_studentid");

        $arr=$ms->field("p2.per_name as fromname,gd_img,per_img,mg_from,gd_name,mg_gdid,mg_time,mg_isread,mg_cont,mg_id,mg_to")->where($where)->join("goods  on goods.gd_id=messages.mg_gdid")->join("person as p2 on p2.per_studentid=messages.mg_from")->where($where)->order("mg_isread asc")->select();

        $res=$arr;
        foreach($arr as $key=>$val){
            //已经回复了
            if($val['mg_isread']){
                //$ms=M("Messages");
                $where2['mg_parent']=$val['mg_id'];
                $tmp=$ms->field("mg_cont")->where($where2)->find();
                $res[$key]['back']=$tmp['mg_cont'];
            }else{
                $res[$key]['back']=null;
            }

        }

        $this->assign("res",$res);
        $this->display();
    }

    //得到用户名
    public function getName($per_name){
        $per=M("Person");
        $where['per_studentid']=$per_name;
        $arr=$per->field("per_name")->where($where)->find();
        return $arr['per_name'];
    }
    /**
     * ajaxReturn的简化版本
     * @param string $status
     * @param string $info
     * @param string $content
     */
    private function returnAjax($status = true, $info = "", $content = null)
    {
        $info = $status ? (empty ($info) ? "操作成功" : $info) : (empty ($info) ? "操作失败" : $info);
        $this->ajaxReturn(array(
            "content" => $content,
            "info" => $info,
            "status" => $status
        ), "json");
    }


}