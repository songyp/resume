<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller {
    public function index(){
		import('Vendor.Rennclient.RennClient');
		$app_key = C("RENN_APP_KEY");
		$app_secret = C("RENN_APP_SECRET");
		$rennClient = new \RennClient($app_key, $app_secret);
		
		$rennClient->setDebug ( DEBUG_MODE );

		$sessionKey = $_REQUEST["xn_sig_session_key"];
		$renrenUserId = $_REQUEST["xn_sig_user"];

		if (!empty($sessionKey) && !empty($renrenUserId)) {
				$userObj = $rennClient->getUserService();
				$userInfo = $userObj->getUserLogin();
		}
		
		$this->show("<h1>OK</h1>");
    }
}