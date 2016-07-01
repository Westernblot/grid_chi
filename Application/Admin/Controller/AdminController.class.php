<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

class AdminController extends Controller {

	public function _initialize() {
		header('Content-Type: text/html; charset=utf-8');
		//echo "<center><h1>后台站点已关闭，将启用新站点访问。<br>如有问题，请联系系统管理员!</h1></center>";

		//判断用户是否已经登录
		if (!isset($_SESSION['user'])) {
			//$this -> error('请先登录!', U('Login/index'), 1);
			$this -> redirect("Admin/Login/index");
		}
	}

}
