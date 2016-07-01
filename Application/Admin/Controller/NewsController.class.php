<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

class NewsController extends AdminController {

    /**
	 * 新闻列表页面
	 */
	public function newsMain(){
        $condition="";
		$object = M ( 'News' ); // 实例化User对象
		$count = $object->where($condition)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page ( $count,10 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show (); // 分页显示输出
		$list = $object->limit ( $Page->firstRow . ',' . $Page->listRows )->order('id desc')->where($condition)->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
		$this->display (); // 输出模板
	}
	
	 /**
	 * 新闻列表页面
	 */
	public function moreNewsMain(){
        $condition="";
		$object = M ( 'News' ); // 实例化User对象
		$count = $object->where($condition)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page ( $count,10 ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show (); // 分页显示输出
		$list = $object->limit ( $Page->firstRow . ',' . $Page->listRows )->order('id desc')->where($condition)->select ();
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
		$this->display (); // 输出模板
	}
	
	/**
	 * 新闻编辑页面
	 */
	 public function  newsUI($id=0){
        $this->assign('nowtime',date('Y-m-d'));
		
	 	$object = M('News');
		$res=$object->find($id);
		
		$attachmentArr=explode(",",$res['attachment']);
		$attachmenturlArr=explode(",",$res['attachmenturl']);		
		$this->assign('attachmentArr',$attachmentArr);
		$this->assign('attachmenturlArr',$attachmenturlArr);
		
		$this->assign('mo',$res);
		$this->display();
	 }
	
	/**
	 * 新闻查看
	 */
	 public function  seeNewsUI($id=0){
        $this->assign('nowtime',date('Y-m-d'));
		
	 	$object = M('News');
		$res=$object->find($id);
		
		$attachmentArr=explode(",",$res['attachment']);
		$attachmenturlArr=explode(",",$res['attachmenturl']);		
		$this->assign('attachmentArr',$attachmentArr);
		$this->assign('attachmenturlArr',$attachmenturlArr);
		
		$this->assign('mo',$res);
		$this->display();
	 }
	
	
	//========================================分隔线===============================================
	
	
	/**
	 * 增
	 */
	 public function insert(){
	 	$object = M('News');
		$object->create();
		
		if(I('attachmenturl')){		
		$attachment=implode(',',$_POST['attachment']);
		$attachmenturl=implode(',',$_POST['attachmenturl']);
		$object->attachment=$attachment;
		$object->attachmenturl=$attachmenturl;
		}
		
		$object -> add_name = $_SESSION['user']['cnname'];
		$object -> add_date = date('Y-m-d H:i:s');
		$res=$object->add();
		
		if($res){
			$this->success('操作成功!',"newsMain");
		}else{
			$this->error('操作失败！');
		}
		
	 }
	
	
	/**
	 * 删除
	 */
	 public function delete($ids=''){
	 	$object = M('News');
	
		$res=$object->delete($ids);
		
		if($res){
			$this->success('操作成功!');
		}else{
			$this->error('操作失败！');
		}
		
	 }
	
	
	/**
	 * 修改
	 */
	 public function update(){
	 	$object = M('News');
		$object->create();
		
		if(I('attachmenturl')){		
		$attachment=implode(',',$_POST['attachment']);
		$attachmenturl=implode(',',$_POST['attachmenturl']);
		$object->attachment=$attachment;
		$object->attachmenturl=$attachmenturl;
		}
		
		$res=$object->save();
		
		if($res){
			$this->success('操作成功!',"newsMain");
		}else{
			$this->error('操作失败！');
		}
		
	 }
	
	
	
}
