<?php defined('SYSPATH') or die('No direct script access.');
class AdminController 
{
	function index() {
		$this->view_data();
	}
	
	function view_data() {
		if(Admin::ins()->isLogin()){
			// TODO 可在uri模块中加入解析参数的功能
			$begin = array_key_exists('begin', $_GET) ? $_GET['begin']:NULL;
			$end = array_key_exists('end', $_GET) ? $_GET['end']:NULL;
		
			$dataTable = Analytics::ins()->getTable($begin, $end);
			include VIEWPATH.'page_admin'.EXT;	
		}else{
			uri::redirect('index.php?c=admin&m=login');
		}
	}
	
	function login($loginFailed = false) {
		include VIEWPATH.'page_login'.EXT;
	}
	
	function login_submit() {
		if(array_key_exists('username', $_POST) && array_key_exists('password', $_POST)){
			$loginPass = Admin::ins()->login($_POST['username'], $_POST['password'], false);
			if($loginPass == false){
				$this->login(true);
			}else{
				uri::redirect('index.php?c=admin');
			}
		}else{
			//invalid login submit just jump to login.
			uri::redirect('index.php?c=admin&m=login');
		}
	}
	
	function logout_submit() {
		Admin::ins()->logout();
		uri::redirect('index.php?c=admin');
	}
}
