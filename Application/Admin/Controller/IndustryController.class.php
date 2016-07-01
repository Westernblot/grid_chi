<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

class IndustryController extends AdminController {

	/**
	 * 分管领导跟踪在谈项目一览
	 */
	public function industryMain() {
		$object = M('Industry');
		$condition = "add_dept='{$_SESSION['user']['dept']}'";
		$count = $object -> where($condition) -> count();
		// 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10);
		// 实例化分页类 传入总记录数和每页显示的记录数(25)

		$show = $Page -> show();
		// 分页显示输出
		$list = $object -> limit($Page -> firstRow . ',' . $Page -> listRows) -> order('id desc') -> where($condition) -> select();
		$this -> assign('list', $list);
		// 赋值数据集
		$this -> assign('page', $show);
		// 赋值分页输出
		$this -> display();
		// 输出模板
	}

	/**
	 * 新增、编辑在谈项目
	 */
	public function industryUI($id = 0, $toPage = 'industryMain') {
		$object = M('Industry');
		$res = $object -> find($id);
		$this -> assign('mo', $res);
		$this -> assign('toPage', $toPage);
		$this -> display();
	}
	
	
	/**
	 * 分管领导跟踪在谈项目一览查看
	 */
	public function industrySelect() {
		$object = M('Industry');
		$condition = "";
		$count = $object -> where($condition) -> count();
		// 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10);
		// 实例化分页类 传入总记录数和每页显示的记录数(25)

		$show = $Page -> show();
		// 分页显示输出
		$list = $object -> limit($Page -> firstRow . ',' . $Page -> listRows) -> order('id desc') -> where($condition) -> select();
		$this -> assign('list', $list);
		// 赋值数据集
		$this -> assign('page', $show);
		// 赋值分页输出
		$this -> display();
		// 输出模板
	}
	
	/**
	 * 新增、编辑在谈项目
	 */
	public function industrySee($id = 0, $toPage = 'industryMain') {
		$object = M('Industry');
		$res = $object -> find($id);
		$this -> assign('mo', $res);
		$this -> assign('toPage', $toPage);
		$this -> display();
	}

	//----------------------------------分隔线----------------------------------------

	/**
	 * 增
	 */
	public function insert($toPage = '') {
		$object = M('Industry');
		$object -> create();
		$object -> add_id = $_SESSION['user']['id'];
		$object -> add_name = $_SESSION['user']['username'];
		$object -> add_dept = $_SESSION['user']['dept'];
		$object -> add_time = date('Y-m-d H:i:s');
		$flag = $object -> add();

		if ($flag) {
			if ($toPage) {
				$this -> success('操作成功！', U($toPage));
			} else {
				$this -> success('操作成功！');
			}
		} else {
			$this -> error('操作失败！');
		}
	}

	/**
	 * 删
	 */
	public function delete($ids = 0) {
		$object = M('Industry');
		$flag = $object -> delete($ids);
		// 删除主键为1,2和5的用户数据
		if ($flag) {
			$this -> success('操作成功！');
		} else {
			$this -> error('操作失败,没有删除数据!');
		}
	}

	/**
	 * 改
	 */
	public function update($toPage = '') {
		$object = M('Industry');
		$object -> create();
		$flag = $object -> save();
		// 根据条件保存修改的数据

		if ($flag) {
			if ($toPage) {
				$this -> success('操作成功！', U($toPage));
			} else {
				$this -> success('操作成功！');
			}
		} else {
			$this -> error('操作失败,没有修改数据!');
		}
	}

}
