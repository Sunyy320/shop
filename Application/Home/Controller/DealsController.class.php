<?php
/*
 * 功能：本系统用于关于交易的相关信息
 * */
namespace Home\Controller;
use Think\Controller;

class DealsController extends BaseController{


   //微信jssdk，配置参数
	public function getConfig(){
		$jssdk=new \JSSDK("wx3d20994328fc5716", "fed5e0fde8772a5c6deb319058ccee72");
		
		$config=$jssdk->getSignPackage();

		return $config;
	}
	
	
	
	 public function  downWxImg($mediaid,$access_token){
       
        $url = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=$access_token&media_id=$mediaid";
        $fileInfo = $this->downloadWeixinFile($url);
        $name="/shop/Public/img/".time().".jpg";
        $filename = $_SERVER['DOCUMENT_ROOT'].$name;
        
        $this->saveWeixinFile($filename, $fileInfo["body"]);
		return $name;
    }


    function downloadWeixinFile($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOBODY, 0);    //只取body头
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $package = curl_exec($ch);
        $httpinfo = curl_getinfo($ch);
        curl_close($ch);
        $imageAll = array_merge(array('header' => $httpinfo), array('body' => $package));
        return $imageAll;
    }

    function saveWeixinFile($filename, $filecontent)
    {
        $local_file = fopen($filename, 'w');

        if (false !== $local_file){
            if (false !== fwrite($local_file, $filecontent)) {
                fclose($local_file);
            }
        }
    }
	
	
	
	
    //用于发布商品
    public function postgoods(){
		$config=$this->getConfig();
		$this->assign("config",$config);
		
        $this->display();
    }

    //上传的商品存入数据库
    public function  saveGoods(){

        $mediaid=$_POST['mediaid'];
        $access_token=$_POST['accessToken'];
		
		
		$gd_img=$this->downWxImg($mediaid,$access_token);
       // echo $mediaid."---".$access_token."\n";
		//echo $gd_img;
		//die;
		

        $arr=array(
            'gd_perwxh'=>session("per_studentid"),
            'gd_name'=>$_POST['gd_name'],
            'gd_des'=>$_POST['gd_des'],
            'gd_categery'=>$_POST['gd_ctg'],
            'gd_price'=>$_POST['gd_price'],
            'gd_img'=> $gd_img,
            'gd_time'=> time(),
            'gd_issale'=>'1',
            'gd_support'=>'0',
            'gd_brower'=>'0'
        );

        $goods=M("Goods");
        if($id=$goods->create($arr)){
            if($goods->add()>0){
                $this->redirect("Deals/postgoods",array('info'=>1));
            }
        }
        $this->redirect("Deals/postgoods",array('info'=>2));


    }



    //商品交易表格显示
    public function dealTable(){
        $this->display();
    }


    //以表格的形式展示交易信息，此处需要按格式返回json数据，否者前台无法正常显示
    public  function getInfo(){
          $deal=M("Deals");
          $where['de_salewxh']=session("per_studentid");
          $arr=$deal->field("de_goodsid,gd_name,de_salewxh,p1.per_name as salename,de_buywxh,p2.per_name as buyname,de_time,de_flag,de_id")->where($where)->join("person  as p1 on p1.per_studentid=deals.de_salewxh")->join("person as p2 on p2.per_studentid=deals.de_buywxh")->join("goods on goods.gd_id=deals.de_goodsid")->select();

        //file_put_contents("d:/mylog.log",M("Deals")->_sql(),FILE_APPEND);
       // file_put_contents("d:/mylog.log",var_export($arr,true),FILE_APPEND);

        $data=$arr;
        foreach($arr as $key=>$val){
            $data[$key]["de_time"]=date("Y-m-d H:i:s",$val['de_time']);
        }

        //file_put_contents("d:/mylog.log",var_export($data,true),FILE_APPEND);
         echo json_encode($data);

    }



    //删除交易
    public function deleteInfo(){

       // file_put_contents("d:/mylog.log",var_export($_POST,true),FILE_APPEND);

        $where['de_id']=$_POST['de_id'];
        $deals=M("Deals");
        $deals->where($where)->delete();

        $this->returnAjax(true,"删除成功",$_POST);
    }


    //修改状态
    public function updateInfo(){
        //file_put_contents("d:/mylog.log",var_export($_POST,true),FILE_APPEND);

        $where['de_id']=$_POST['de_id'];
        $data['de_flag']=$_POST['de_flag'];
        $deals=M("Deals");
        $deals->where($where)->save($data);

        $this->returnAjax(true,"更新成功",$_POST);
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