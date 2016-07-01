<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

class ZidianController extends Controller {
	
	/**
	 * 数据字典页面
	 */
	public function zidianDoc() {

		$object = M('Zidian');
		$list = $object -> select();
		$this -> assign('list', $list);

		$this -> display();
	}

	//=================================分隔线==============================================

	/**
	 * 基础数据添加
	 */
	public function insert($name = '', $kind = '') {

		$object = M('Zidian');
		$data['name'] = $name;
		$data['kind'] = $kind;
		$res = $object -> data($data) -> add();
		if ($res) {
			$this -> success('操作成功!');
		} else {
			$this -> error('操作失败!');
		}
	}

	/**
	 * 基础数据删除
	 */

	public function delete($id = 0) {
		$object = M('Zidian');
		$res = $object -> delete($id);
		if ($res) {
			$this -> success('操作成功!');
		} else {
			$this -> error('操作失败!');
		}
	}

}
	

	

