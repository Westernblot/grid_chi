<?php

namespace Admin\Controller;

use Think\Controller;

use Think\Model;//引入Model

class UserController extends AdminController {
	
	/**
	 * 用户列表
	 */
	public function userMain() {
		
		$user = M ( 'User' ); // 实例化User对象
		
		$count = $user->count();// 查询满足要求的总记录数
		$Page = new \Think\Page ( $count,10 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)

		$show = $Page->show (); // 分页显示输出
		$list = $user->limit ( $Page->firstRow . ',' . $Page->listRows )->order('id desc')->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
		$this->display (); // 输出模板
	}
	
	
	/**
	 * 新增用户、编辑用户页面
	 */
	 public function userUI($id=0){
	
		$user=M('User');
		$res=$user->find($id);
		$this->assign('mo',$res);
	 	$this->display();
	 }
	 
	 /**
	  * 自助服务，用户修改个人密码
	  */
	  public function setPwdUI($id=0){
		$user=M('User');
		$res=$user->find($id);
		$this->assign('mo',$res);
		$this->display();
	  }
	 
	  /**
	  * 修改用户
	  */
	public function updatePwd(){
		$user = M("User"); // 实例化User对象
		// 根据表单提交的POST数据创建数据对象
		$user->create();
		$user->password=md5($user->password);//修改密码时，对密码进行MD5加密
		$flag=$user->save(); // 根据条件保存修改的数据
		
		if($flag>0){
			$this->success('操作成功！');
		}else{
			$this->error('操作失败');
		}
	}
	 
	 //===============================================分割线===========================================
	 
	 /**
	  * 新增用户
	  */
	 public function insert(){
	 	
		$user=M('User');
		$user->create(); //创建User数据对象
		
		$username=$user->username;
		$res = $user->where ("username='{$username}'")->find ();
		
		if($res){
			$this->error('用户名已存在!');
		}
		
		$user->add_time=date('Y-m-d h:i:s');
		$user->password=md5($user->password);//对密码进行MD5加密
		$flag=$user->add();
		
		if($flag){
			$this->success('操作成功!',U('userMain'));
		}else{
			$this->error('操作失败！');
		}
		
	 }
	 
	 /**
	  * 修改用户
	  */
	public function update(){
		$user = M("User"); // 实例化User对象
		// 根据表单提交的POST数据创建数据对象
		$user->create();
		$flag=$user->save(); // 根据条件保存修改的数据
		
		if($flag){
			$this->success('操作成功！',U('userMain'));
		}else{
			$this->error('操作失败,没有修改数据!');
		}
	}
	
	
	/**
	 * 删除
	 */
	 public function delete($ids=0){
		$user = M("User"); // 实例化User对象
		$flag=$user->delete($ids); // 删除主键为1,2和5的用户数据
		if($flag){
			$this->success('操作成功！');
		}else{
			$this->error('操作失败,没有删除数据!');
		}
	 }
	 
	 
	 /**
	  * 重置密码
	  */
	  public function resetPWD(){
	  	$ids=$_REQUEST['ids'];
	  	$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$flag=$Model->execute("update tp_user set password = md5(1) where id IN ({$ids})");  //获取所有的权限菜单
		if($flag>0){
			$this->success('操作成功！',U('userMain'));
		}else{
			$this->error('操作失败,没有重置密码!');
		}
	  }
	  
	  
	  //=========================================分隔线===============================================
	  
	  /**
	   * 设置用户权限 UI
	   */
	   public function powerUI(){
	   	$id=$_REQUEST['id'];
		
		$u=M('User');
		$user=$u->find($id);
		$this->assign('user',$user);
		
		$menu=M('Menu');
		$menuList=$menu->select();
		$this->assign('menuList',$menuList);
		
		$this->display();
	   }
	   
	   /**
	    * 设置用户权限
	    */
	   public function setPower(){

		$id=$_POST['id'];
		//$power=$_POST['power'];
		$power=implode(',',$_POST['power']);
 
	   	$user = M("User"); // 实例化User对象
	   	$data['id'] = $id ;
	   	$data['power'] = $power;
	
		$flag=$user->save($data); // 根据条件保存修改的数据
		 if($flag>0){
			$this->success('操作成功！',U('userMain'));
		}else{
			$this->error('操作失败,没有更新用户权限!');
		}
	   }
}