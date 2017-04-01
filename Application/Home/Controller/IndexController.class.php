<?php
/*
 * 功能：本系统用于处理主页面的相关信息
 * 主要处理商品信息
 * */
namespace Home\Controller;
use Think\Controller;

class IndexController extends BaseController{

     public function search(){
		 $key=$_POST['keyword'];
		 $where['gd_name']=array('like',"%$key%");
		 $goods=M("Goods");
        $list=$goods->field("gd_id,gd_img,gd_price,gd_name")
		->where($where)->select();

        $this->assign("list",$list);
        $this->display("categery");
	 }
	 
	
	 
	 //显示主页
	 public function main(){
		 session("per_studentid","1405010134");
		  //从数据库中取出数据
        $goods=M("Goods");

        $dress=$goods->field("gd_id,gd_img")->where("gd_categery='服装饰品'")->order('gd_support desc')->limit(3)->select();

        $books=$goods->field("gd_id,gd_img")->where("gd_categery='书籍'")->order('gd_support desc')->limit(3)->select();

        $dq=$goods->field("gd_id,gd_img")->where("gd_categery='电器办公'")->order('gd_support desc')->limit(3)->select();

        $others=$goods->field("gd_id,gd_img")->where("gd_categery='其他'")->order('gd_support desc')->limit(3)->select();


        $this->assign("dress",$dress);
        $this->assign("books",$books);
        $this->assign("dq",$dq);
        $this->assign("others",$others);

        $this->display();
	 }
	 
	
    //登陆验证
    public function index(){
        
		$url="http://syy.test.ticknet.cn/shop/home/login/";
        $html = "<!DOCTYPE html><html lang=\"en\"><head><script>location.href= \"$url\";</script></head></html>";
        exit($html);
        $this->display();
			/*
    
		 if (isset($_GET['logToken'])){
				$rand=rand(10000000,99999999);
				$code=$_GET['logToken'];
				$res= $this->postCurl('http://wechat.hnust.cn/api/', json_encode(array(
					'appid' => '8',
					'random'  =>  $rand,
					'token' =>  hash('ripemd160', '93nfcab5cffd9eeb' . $rand),
					'action'  => 'CheckToken',
					'logToken'  =>$code
				)));

				$res2=json_decode($res,true);
				$userid=$res2['data']['userid'];

				//如果不是本校学生，则不让登陆
				if(!isset($userid)){
					$this->display("error");
					die;
				}


				$rand2=rand(10000000,99999999);
				$res3= $this->postCurl('http://wechat.hnust.cn/api/', json_encode(array(
					'appid' => '8',
					'random'  =>  $rand2,
					'token' =>  hash('ripemd160', '93nfcab5cffd9eeb' . $rand2),
					'action'  => 'GetUserInfo',
					'userid'  =>$userid
				)));

				$res4=json_decode($res3,true);

				$name=$res4['data']['name'];
				$college=$res4['data']['college'];
				$class=$res4['data']['class'];
				$photo=$res4['data']['photo'];

			   // header("Location:http://shop.sunyy320.cn/shop/");

				//echo  $userid."---".$name."---".$college."---".$class."---".$photo;
			    //die;
				$person=M("Person");
				$where['per_studentid']=$userid;
				$count=$person->where($where)->count();
				if($count==0){
					$where['per_name']=$name;
					$where['per_marjor']=$college;
					$where['per_class']=$class;
					$where['per_img']=$photo;
					$person->data($where)->add();
				}
				session("per_studentid",$userid);
				$this->redirect("Index/main");
				
				
			}else{
				$r_url="http://shop.sunyy320.cn/shop/home/index/index";
				
				header("Location:http://http://api.ticknet.cn/v1/AuthToken?appid=8&appSecret=93nfcab5cffd9eeb".urlencode($r_url));
				die();
			}*/
		
		
		
       
    }


    //根据分类显示商品列表页面
    public function categery(){
        $categery=$_GET['cty'];
        $goods=M("Goods");
		if($categery=="fz"){
		     $categery="服装饰品";
		}elseif($categery=="dq"){
		      $categery="电器办公";
		}elseif($categery=="sj"){
		      $categery="书籍";
		}elseif($categery=="qt"){
		      $categery="其他";
		}
        $where['gd_categery']=$categery;
        $list=$goods->field("gd_id,gd_img,gd_price,gd_name")->where($where)->order('gd_support desc')->select();

        $this->assign("list",$list);
        $this->display();

    }


    //显示热门商品
    public function hotShop(){
        $goods=M("Goods");
        $list=$goods->field("gd_id,gd_img,gd_price,gd_name")->order('gd_support desc')->select();

        $this->assign("list",$list);
        $this->display("categery");
    }


    //显示分类页
    public function fenlei(){
        $this->display();
    }

    //显示一个商品的详细页面
    public function goodsInfo(){
        $gd_id=$_GET['id'];

        $goods=M("Goods");
        $where['gd_id']=$gd_id;

        $list=$goods->field("gd_id,gd_img,gd_price,gd_name,gd_des,gd_categery,gd_support,gd_browse,per_name,per_studentid,gd_time")->where($where)->join("person on person.per_studentid=goods.gd_perwxh")->find();

        //echo M("Goods")->_sql();var_dump($list);die();


        //查询留言
        $ms=M("Messages");
        $where2['mg_gdid']=$gd_id;
        $where2['mg_parent']='0'; //查询根节点

        $leave=$ms->field("mg_id,mg_time,mg_cont,mg_from,per_name")->where($where2)->join("person on person.per_studentid=messages.mg_from")->select();

        //echo M("Messages")->_sql();var_dump($leave);die();

        $back=$leave;
        foreach($leave as $key=>$value){
            $where3['mg_parent']=$value['mg_id'];
            $back[$key]['back']=$ms->field("mg_cont")->where($where3)->find();
        }
        //echo M("Messages")->_sql();var_dump($back);die();


        $this->assign("list",$list);
        $this->assign("back",$back);

        $this->display();
    }
}