<?php
include_once 'Token.php';
include_once 'wx.php';
class Menu {
	private $access_token;
	public function Menu($access_token) {
		$this->access_token = $access_token;
	}
	
	/**
	 * 创建菜单
	 * 通过传入的参数创建微信菜单,返回1创建成功,返回0创建失败
	 * $data 为创建菜单的json数据
	 */
	public function createMenu($data) {
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=" . $this->access_token );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
		curl_setopt ( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)' );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_AUTOREFERER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		$tmpInfo = curl_exec ( $ch );
		if (curl_errno ( $ch )) {
			return curl_error ( $ch );
		}
		
		curl_close ( $ch );
		$result = json_decode ( $tmpInfo, true );
		if (strcmp ( $result ['errcode'], "0" ) == 0)
			return 1;
		else
			return 0;
	}
	
	/**
	 * 创建默认菜单
	 * 
	 * @return 1创建成功,0创建失败
	 */
	public function createDefaultMenu() {
 	$data = '{			
     "button":[{
		   "type": "view",
		   "name":"进入交易市场",
		    "url":"http://ticknet4.duapp.com/shop/weixin/test.html"
      }]
     }';
 	
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=" . $this->access_token );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
		curl_setopt ( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)' );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_AUTOREFERER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		$tmpInfo = curl_exec ( $ch );
		if (curl_errno ( $ch )) {
			return curl_error ( $ch );
		}
		
		curl_close ( $ch );
		$result = json_decode ( $tmpInfo, true );
		if (strcmp ( $result ['errcode'], "0" ) == 0)
			return 1;
		else
			return 0;
	}
	// 获取菜单
	public function getMenu() {
		return file_get_contents ( "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=" . $this->access_token );
	}
	// 删除菜单
	public function deleteMenu() {
		return file_get_contents ( "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=" . $this->access_token );
	}
}