<?php


define("TOKEN", "320");



$wechatObj = new wechatCallbackapiTest();
if (isset ($_GET['echostr'])) {
	$wechatObj->valid();
} else {
	$wechatObj->responseMsg();
}






class wechatCallbackapiTest
{

	private $client;
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";          

			    $event=$postObj->Event;

                switch($postObj->MsgType){
					//如果是订阅事件
					case 'event':
						if($event=="subscribe"){
							$contentStr = "欢迎订阅";
							$this->client=new ClientTextRequest($fromUsername,$toUsername);
							$resultStr=$this->client->sprintf($contentStr);
							echo $resultStr;
						}elseif($event=="CLICK"){
							switch ($postObj->EventKey)
							{
								case "checkUser":
									$contentStr="123";
									$this->client=new ClientTextRequest($fromUsername,$toUsername);
									$resultStr=$this->client->sprintf($contentStr);
									echo $resultStr;
									break;
								default:
									$contentStr = "	请点击其他选项";
									$this->client=new ClientTextRequest($fromUsername,$toUsername);
									$resultStr=$this->client->sprintf($contentStr);
									echo $resultStr;
									break;
							}
						}
					   break;
					case 'text':
						//输入shop后，给出链接，跳转到登陆页面,进行授权登陆
						if($keyword=="shop"){
							$url=urlencode("http://shop.sunyy320.cn/shop/weixin/test.php/");
							$contentStr = "<a href='".$url."'>点击这里体验</a>";
							$this->client=new ClientTextRequest($fromUsername,$toUsername);
							$resultStr=$this->client->sprintf($contentStr);
							echo $resultStr;
						}
						break;

				}


        }else {
        	echo "";
        	exit;
        }
    }


	private function https_request($url,$data = null){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}

	private function checkSignature()
	{
		// you must define TOKEN by yourself
		if (!defined("TOKEN")) {
			throw new Exception('TOKEN is not defined!');
		}

		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];

		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		// use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}



}
?>
<?php
class ClientTextRequest {
	private $textTpl;
	private $fromUsername;
	private $toUsername;
	private $time;
	private $msgType;
	/**
	 * 构造函数
	 * @param unknown $fromUsername
	 * @param unknown $toUsername
	 * @param unknown $time
	 */
	public function __construct($fromUsername, $toUsername) {
		$this->textTpl = "<xml>
		                        <ToUserName><![CDATA[%s]]></ToUserName>
		                        <FromUserName><![CDATA[%s]]></FromUserName>
		                        <CreateTime>%s</CreateTime>
		                        <MsgType><![CDATA[%s]]></MsgType>
		                        <Content><![CDATA[%s]]></Content>
		                        <FuncFlag>0</FuncFlag>
		                        </xml>";
		$this->fromUsername = $fromUsername;
		$this->toUsername = $toUsername;
		$this->time = time();
		$this->msgType = "text";
	}
	/**
	 * 封装要发送给微信服务器的信息，如果要发送给客户只需要 输出返回值即可 然后通过 echo 打印返回的值即可
	 * @param unknown $contentStr
	 * @return string
	 */
	public function sprintf($contentStr) {
		return sprintf($this->textTpl, $this->fromUsername, $this->toUsername, $this->time, $this->msgType, $contentStr);
	}
}

?>
