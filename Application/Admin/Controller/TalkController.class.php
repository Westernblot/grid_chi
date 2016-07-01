<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

class TalkController extends AdminController {
	
	
    //信息列表
	public function talkMain($name=''){
		$condition = "add_dept='{$_SESSION['user']['dept']}'";
		$object = M('talk');       // 实例化对象
		$count = $object->where($condition)->count();    // 查询满足要求的总记录数
		$Page = new \Think\Page ( $count,10 ); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$show = $Page->show (); // 分页显示输出
		$list = $object->limit ( $Page->firstRow . ',' . $Page->listRows )->where($condition)->order('id desc')->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
		$this->display (); // 输出模板
	}
    
	//编辑
	public function talkUI($id=0){
		$object = M('talk');  
		$res = $object->find($id);
		$this->assign('mo',$res);
	 	$this->display();
	}
	
	//编辑
	public function seetalkUI($id=0){
		$object = M('talk');  
		$res = $object->find($id);
		$this->assign('mo',$res);
	 	$this->display();
	}
	
	
	//新增
	public function insert(){
		$object = M('talk');
		$object->create();
		$object -> first_add_time = date("Y-m-d");
		$object -> add_id = $_SESSION['user']['id'];
		$object -> add_name = $_SESSION['user']['username'];
		$object -> add_time = date('Y-m-d H:i:s');
		$object -> add_dept = $_SESSION['user']['dept'];
		$flag = $object->add();
		if($flag){
			$this->success('操作成功!',U('talkMain'));
		}else{
			$this->error('操作失败！');
		}
	}
    
	//修改
	public function update(){
		$object = M('talk');
		$object->create();
		$flag = $object->save();
		if($flag){
			$this->success('操作成功!',U('talkMain'));
		}else{
			$this->error('操作失败！');
		}
	}
	
	//删除
	public function delete($ids=0){
		$object = M('talk');
		$flag=$object->delete($ids); // 删除主键为1,2和5的用户数据
		if($flag){
			$this->success('操作成功！');
		}else{
			$this->error('操作失败,没有删除数据!');
		}
	}
    
    
}