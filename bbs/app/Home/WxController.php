<?php
namespace App\Home;

use App\Component\Wx\WXBizMsgCrypt;
require_once 'app/Component/wx/wxBizMsgCrypt.php';
use App\Logic\WxLogic;
use App\Logic\WxMenuLogic;
/**
 * wx
 * @author ntlee
 * @version 2017-06-04
 */
class WxController extends BaseController
{
	
	public function index()
	{//echo 'vc';
		$wxLogic = new WxLogic();
		//验证接口
		if($_GET['echostr']){
			$wxLogic->chkValid();
		}
		
		$msg = $wxLogic->getMsg();
		$msgType = $msg['msgType'];
		$content = $msg['content'];
		$toUserName = $msg['toUserName'];
		$fromUserName = $msg['fromUserName'];
				
		if($msgType == 'text'){
			$params = array('content'=>$content,'toUserName'=>$fromUserName,'fromUserName'=>$toUserName);
			$responseMsg = $wxLogic->responseMsg($params);
			echo $responseMsg;
			exit;
		}
	}
	
	public function createMenu()
	{
		$wxMenuLogic = new WxMenuLogic();
		$res = $wxMenuLogic->create();
		var_dump($res);
	}
	
	public function index2()
	{
		
		
		// 第三方发送消息给公众平台
		$encodingAesKey = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFG";
		$token = "pamtest";
		$timeStamp = "1409304348";
		$nonce = "xxxxxx";
		$appId = "wxb11529c136998cb6";
		$text = "<xml><ToUserName><![CDATA[oia2Tj我是中文jewbmiOUlr6X-1crbLOvLw]]></ToUserName><FromUserName><![CDATA[gh_7f083739789a]]></FromUserName><CreateTime>1407743423</CreateTime><MsgType><![CDATA[video]]></MsgType><Video><MediaId><![CDATA[eYJ1MbwPRJtOvIEabaxHs7TX2D-HV71s79GUxqdUkjm6Gs2Ed1KF3ulAOA9H1xG0]]></MediaId><Title><![CDATA[testCallBackReplyVideo]]></Title><Description><![CDATA[testCallBackReplyVideo]]></Description></Video></xml>";
		
		
		$pc = new WXBizMsgCrypt($token, $encodingAesKey, $appId);
		$encryptMsg = '';
		$errCode = $pc->encryptMsg($text, $timeStamp, $nonce, $encryptMsg);
		if ($errCode == 0) {
			print("加密后: " . $encryptMsg . "\n");
		} else {
			print($errCode . "\n");
		}
		//exit;
		$xml_tree = new \DOMDocument();
		$xml_tree->loadXML($encryptMsg);
		$array_e = $xml_tree->getElementsByTagName('Encrypt');
		$array_s = $xml_tree->getElementsByTagName('MsgSignature');
		$encrypt = $array_e->item(0)->nodeValue;
		$msg_sign = $array_s->item(0)->nodeValue;
		
		$format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
		$from_xml = sprintf($format, $encrypt);
		
		// 第三方收到公众号平台发送的消息
		$msg = '';
		$errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
		if ($errCode == 0) {
			print("解密后: " . $msg . "\n");
		} else {
			print($errCode . "\n");
		}	
	}
	
	public function hello()
	{
		echo "this is a hello page for wechat";
	}
		
}


