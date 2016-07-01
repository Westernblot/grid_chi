<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

/**
 * 项目管理 controller
 */
class ProjectController extends AdminController {

    	//===================================通用调用方法--分隔线============================================

	/**
	 * 条件分页查询
	 */
	public function selectByPage($condition = '') {
		//$condition = "tc_status='已投产'";
		$object = M('Project');
		$count = $object -> where($condition) -> count();
		// 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10);
		// 实例化分页类 传入总记录数和每页显示的记录数(25)

		$show = $Page -> show();
		// 分页显示输出
		$list = $object -> limit($Page -> firstRow . ',' . $Page -> listRows) -> order('add_dept desc,id desc') -> where($condition) -> select();
		$this -> assign('list', $list);
		// 赋值数据集
		$this -> assign('page', $show);
		
		$this->assign('np',$Page -> firstRow);  //当前页
		// 赋值分页输出
	}

	/**
	 * 显示数据
	 */
	public function findOneData($id = 0, $toPage = '') {
		$object = M('Project');
		$res = $object -> find($id);
		$this -> assign('mo', $res);
		$this -> assign('toPage', $toPage);
		//附件处理
		$zc_attachmentArr = explode(",", $res['zc_attachment']);
		$zc_attachment_urlArr = explode(",", $res['zc_attachment_url']);
		$this -> assign('zc_attachmentArr', $zc_attachmentArr);
		$this -> assign('zc_attachment_urlArr', $zc_attachment_urlArr);
		//附件处理
		$kg_attachmentArr = explode(",", $res['kg_attachment']);
		$kg_attachment_urlArr = explode(",", $res['kg_attachment_url']);
		$this -> assign('kg_attachmentArr', $kg_attachmentArr);
		$this -> assign('kg_attachment_urlArr', $kg_attachment_urlArr);
		//附件处理
		$tc_attachmentArr = explode(",", $res['tc_attachment']);
		$tc_attachment_urlArr = explode(",", $res['tc_attachment_url']);
		$this -> assign('tc_attachmentArr', $tc_attachmentArr);
		$this -> assign('tc_attachment_urlArr', $tc_attachment_urlArr);

		//高拍仪
		$zc_gpyArr = explode(",", $res['zc_gpy']);
		$this -> assign('zc_gpyArr', $zc_gpyArr);
		//高拍仪
		$kg_gpyArr = explode(",", $res['kg_gpy']);
		$this -> assign('kg_gpyArr', $kg_gpyArr);
		//高拍仪
		$tc_gpyArr = explode(",", $res['tc_gpy']);
		$this -> assign('tc_gpyArr', $tc_gpyArr);
	}

	//=================================分隔线============================================

	
	//变更签约项目
	 public function bgqyProjectUI($id = 0, $toPage = 'ztProjectMain'){
	 	$this -> findOneData($id, $toPage);
		$this -> display();
	 }
	//变更注册项目
	 public function bgzcProjectUI($id = 0, $toPage = 'qyProjectMain'){
	 	$this -> findOneData($id, $toPage);
		$this -> display();
	 }
	//变更开工项目
	 public function bgkgProjectUI($id = 0, $toPage = 'zcProjectMain'){
	 	$this -> findOneData($id, $toPage);
		$this -> display();
	 }
	//变更投产项目
	 public function bgtcProjectUI($id = 0, $toPage = 'kgProjectMain'){
	 	$this -> findOneData($id, $toPage);
		$this -> display();
	 }
		
    //================================分隔线====================================

	/**
	 * 在谈项目一览
	 */
	public function ztProjectMain($zt_status = '在谈') {
		$condition = "zt_status='在谈' and add_dept='{$_SESSION['user']['dept']}'";
		$this -> selectByPage($condition);
		$this -> display();
		// 输出模板

	}

	/**
	 * 新增、编辑在谈项目
	 */
	public function ztProjectUI($id = 0, $toPage = 'ztProjectMain') {
		$this -> findOneData($id, $toPage);
		$this -> display();
	}

	//----------------------------------签约项目  分隔线----------------------------------------

	/**
	 * 签约项目一览表
	 */
	public function qyProjectMain($qy_project_name = '', $qy_flag = '') {
		$this -> assign('qy_project_name', $qy_project_name);
		$this -> assign('qy_flag', $qy_flag);
		$condition = "qy_status='已签约' and qy_flag like '%{$qy_flag}%' and add_dept='{$_SESSION['user']['dept']}' and qy_project_name like '%{$qy_project_name}%'";
		$this -> selectByPage($condition);
		$this -> display();
		// 输出模板
	}

	/**
	 * 签约项目编辑UI
	 */
	public function qyProjectUI($id = 0, $toPage = 'qyProjectMain') {
		$this -> findOneData($id, $toPage);
		$this -> display();
	}

	//----------------------------------注册项目  分隔线----------------------------------------

	/**
	 * 注册项目一览表
	 */
	public function zcProjectMain($zc_hs_name = '', $zc_flag = '') {
		$this -> assign('zc_hs_name', $zc_hs_name);
		$this -> assign('zc_flag', $zc_flag);
		$condition = "zc_status='已注册' and zc_flag like '%{$zc_flag}%' and add_dept='{$_SESSION['user']['dept']}' and zc_hs_name like '%{$zc_hs_name}%'";
		$this -> selectByPage($condition);
		$this -> display();
		// 输出模板
	}

	/**
	 * 注册项目编辑UI
	 */
	public function zcProjectUI($id = 0, $toPage = 'zcProjectMain') {
		$this -> findOneData($id, $toPage);
		$this -> display();
	}

	//----------------------------------开工项目  分隔线----------------------------------------

	/**
	 * 开工项目一览表
	 */
	public function kgProjectMain($zc_hs_name = '', $kg_flag = '') {
		$this -> assign('zc_hs_name', $zc_hs_name);
		$this -> assign('kg_flag', $kg_flag);
		$condition = "kg_status='已开工' and kg_flag like '%{$kg_flag}%' and add_dept='{$_SESSION['user']['dept']}' and zc_hs_name like '%{$zc_hs_name}%'";
		$this -> selectByPage($condition);
		$this -> display();
		// 输出模板
	}

	/**
	 * 开工项目编辑UI
	 */
	public function kgProjectUI($id = 0, $toPage = 'kgProjectMain') {
		$this -> findOneData($id, $toPage);
		$this -> display();
	}

	//----------------------------------投产项目  分隔线----------------------------------------

	/**
	 * 开工项目一览表
	 */
	public function tcProjectMain($zc_hs_name = '', $tc_flag = '') {
		$this -> assign('zc_hs_name', $zc_hs_name);
		$this -> assign('tc_flag', $tc_flag);
		$condition = "tc_status='已投产' and tc_flag like '%{$tc_flag}%' and add_dept='{$_SESSION['user']['dept']}' and zc_hs_name like '%{$zc_hs_name}%'";
		$this -> selectByPage($condition);
		$this -> display();
		// 输出模板
	}

	/**
	 * 投产项目编辑UI
	 */
	public function tcProjectUI($id = 0, $toPage = 'tcProjectMain') {
		$this -> findOneData($id, $toPage);
		$this -> display();
	}

	//----------------------------------分隔线----------------------------------------

	/**
	 * 增
	 */
	public function insert($toPage = '') {
		$object = M('Project');
		$object -> create();
		$object -> first_add_time = date("Y-m-d");
		$object -> add_id = $_SESSION['user']['id'];
		$object -> add_name = $_SESSION['user']['username'];
		$object -> add_time = date('Y-m-d H:i:s');
		$object -> add_dept = $_SESSION['user']['dept'];
		
		
		$zc_register_no=$object->zc_register_no;
		$zc_hs_name=$object->zc_hs_name;
		if($zc_register_no!='' &&  $zc_hs_name!=''){
			$res = $object->where ("zc_register_no = '{$zc_register_no}' or zc_hs_name = '{$zc_hs_name}'")->find ();
		
		    if($res){
			  $this->error('该项目已存在!');
		    }
		}
		

		//附件处理
		if (I('zc_attachment_url')) {
			$zc_attachment = implode(',', $_POST['zc_attachment']);
			$zc_attachment_url = implode(',', $_POST['zc_attachment_url']);
			$object -> zc_attachment = $zc_attachment;
			$object -> zc_attachment_url = $zc_attachment_url;
		}
		//附件处理
		if (I('kg_attachment_url')) {
			$kg_attachment = implode(',', $_POST['kg_attachment']);
			$kg_attachment_url = implode(',', $_POST['kg_attachment_url']);
			$object -> kg_attachment = $kg_attachment;
			$object -> kg_attachment_url = $kg_attachment_url;
		}
		//附件处理
		if (I('tc_attachment_url')) {
			$tc_attachment = implode(',', $_POST['tc_attachment']);
			$tc_attachment_url = implode(',', $_POST['tc_attachment_url']);
			$object -> tc_attachment = $tc_attachment;
			$object -> tc_attachment_url = $tc_attachment_url;
		}

		//高拍仪
		if (I('zc_gpy')) {
			$zc_gpy = implode(',', $_POST['zc_gpy']);
			$object -> zc_gpy = $zc_gpy;
		}
		//高拍仪
		if (I('kg_gpy')) {
			$kg_gpy = implode(',', $_POST['kg_gpy']);
			$object -> kg_gpy = $kg_gpy;
		}
		//高拍仪
		if (I('tc_gpy')) {
			$tc_gpy = implode(',', $_POST['tc_gpy']);
			$object -> tc_gpy = $tc_gpy;
		}

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
		$object = M('Project');
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
		$object = M('Project');
		$object -> create();

		//附件处理
		if (I('zc_attachment_url')) {
			$zc_attachment = implode(',', $_POST['zc_attachment']);
			$zc_attachment_url = implode(',', $_POST['zc_attachment_url']);
			$object -> zc_attachment = $zc_attachment;
			$object -> zc_attachment_url = $zc_attachment_url;
		}
		//附件处理
		if (I('kg_attachment_url')) {
			$kg_attachment = implode(',', $_POST['kg_attachment']);
			$kg_attachment_url = implode(',', $_POST['kg_attachment_url']);
			$object -> kg_attachment = $kg_attachment;
			$object -> kg_attachment_url = $kg_attachment_url;
		}
		//附件处理
		if (I('tc_attachment_url')) {
			$tc_attachment = implode(',', $_POST['tc_attachment']);
			$tc_attachment_url = implode(',', $_POST['tc_attachment_url']);
			$object -> tc_attachment = $tc_attachment;
			$object -> tc_attachment_url = $tc_attachment_url;
		}

		//高拍仪
		if (I('zc_gpy')) {
			$zc_gpy = implode(',', $_POST['zc_gpy']);
			$object -> zc_gpy = $zc_gpy;
		}
		//高拍仪
		if (I('kg_gpy')) {
			$kg_gpy = implode(',', $_POST['kg_gpy']);
			$object -> kg_gpy = $kg_gpy;
		}
		//高拍仪
		if (I('tc_gpy')) {
			$tc_gpy = implode(',', $_POST['tc_gpy']);
			$object -> tc_gpy = $tc_gpy;
		}

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

	//----------------------------项目审核    分隔线---------------------------------

	/**
	 * 审核是否认可 NEW
	 */
	public function cmdProjectAudit($id = 0, $field_flag = '', $fieldValue_flag = '', $field_opinion = '', $opinion = '', $toPage = '',$flag = '', $add_dept = '',$s_date='',$e_date='') {
		$model = new Model();
		// 实例化一个model对象 没有对应任何数据表
		$dateTime = date('Y-m-d H:i:s');
		$opinion = "审核状态：{$fieldValue_flag}；审核时间：{$dateTime}；审核人：{$_SESSION['user']['cnname']}；审核意见：{$opinion}<br>";
		$status = $model -> execute("update tp_project set {$field_flag}='{$fieldValue_flag}',{$field_opinion}=CONCAT({$field_opinion},'{$opinion}') where id ={$id}");
		if ($status) {
			if ($toPage) {
				$this -> success('操作成功！', U($toPage)."?flag={$flag}&add_dept={$add_dept}&s_date={$s_date}&e_date={$e_date}");
			} else {
				$this -> success('操作成功！');
			}
		} else {
			$this -> error('操作失败!');
		}
	}

	/**
	 * 修改审核状态：提交审核/撤销审核
	 */
	public function cmdAudit($field = '', $fieldValue = '', $ids = 0) {
		$model = new Model();
		// 实例化一个model对象 没有对应任何数据表
		$flag = $model -> execute("update tp_project set {$field} = '{$fieldValue}' where id IN ({$ids})");
		//获取所有的权限菜单
		if ($flag > 0) {
			$this -> success('操作成功！');
		} else {
			$this -> error('操作失败!');
		}
	}

	/**
	 * 签约项目一览表
	 */
	public function auditQyProjectMain($qy_flag = '', $add_dept = '') {
		$this -> assign('qy_flag', $qy_flag);
		$this -> assign('add_dept', $add_dept);
		$condition = "qy_status='已签约' and add_dept like '%{$add_dept}%' and qy_flag like '%{$qy_flag}%' and qy_flag !='已保存'";
		$this -> selectByPage($condition);
		$this -> display();
		// 输出模板
	}

	/**
	 * 审核签约项目
	 */
	public function auditQyProjectUI($id = 0, $toPage = 'auditQyProjectMain') {
		$this -> findOneData($id, $toPage);
		$this -> display();
	}

	/**
	 * 注册项目一览表
	 */
	public function auditZcProjectMain($flag = '', $add_dept = '',$s_date='',$e_date='') {
		$this -> assign('flag', $flag);
		$this -> assign('add_dept', $add_dept);
		$this -> assign('s_date', $s_date);
		$this -> assign('e_date', $e_date);
		
		$condition = "zc_status='已注册' and add_dept like '%{$add_dept}%' and zc_flag like '%{$flag}%' and zc_flag !='已保存'";
		
	   if($s_date!=''){
	   	 $condition = $condition." and zc_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and zc_date <='{$e_date}'";
	   }
		
		$this -> selectByPage($condition);
		$this -> display();
		// 输出模板
	}

	/**
	 * 审核注册项目
	 */
	public function auditZcProjectUI($id = 0, $toPage = 'auditZcProjectMain',$flag = '', $add_dept = '',$s_date='',$e_date='') {
		$this -> assign('flag', $flag);
		$this -> assign('add_dept', $add_dept);
		$this -> assign('s_date', $s_date);
		$this -> assign('e_date', $e_date);
		
		$this -> findOneData($id, $toPage);
		$this -> display();
	}

	/**
	 * 开工项目一览表
	 */
	public function auditKgProjectMain($flag = '', $add_dept = '',$s_date='',$e_date='') {
		$this -> assign('flag', $flag);
		$this -> assign('add_dept', $add_dept);
		$this -> assign('s_date', $s_date);
		$this -> assign('e_date', $e_date);
		
		$condition = "kg_status='已开工' and add_dept like '%{$add_dept}%' and kg_flag like '%{$flag}%' and kg_flag !='已保存'";
		
	   if($s_date!=''){
	   	 $condition = $condition." and kg_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and kg_date <='{$e_date}'";
	   }
		
		$this -> selectByPage($condition);
		$this -> display();
		// 输出模板
	}

	/**
	 * 审核开工项目
	 */
	public function auditKgProjectUI($id = 0, $toPage = 'auditKgProjectMain',$flag = '', $add_dept = '',$s_date='',$e_date='') {
		$this -> assign('flag', $flag);
		$this -> assign('add_dept', $add_dept);
		$this -> assign('s_date', $s_date);
		$this -> assign('e_date', $e_date);
		
		$this -> findOneData($id, $toPage);
		$this -> display();
	}

	/**
	 * 投产项目一览表
	 */
	public function auditTcProjectMain($flag = '', $add_dept = '',$s_date='',$e_date='') {
		$this -> assign('flag', $flag);
		$this -> assign('add_dept', $add_dept);
		$this -> assign('s_date', $s_date);
		$this -> assign('e_date', $e_date);
		
		$condition = "tc_status='已投产' and add_dept like '%{$add_dept}%' and tc_flag like '%{$flag}%' and tc_flag !='已保存'";
		
		if($s_date!=''){
	   	 $condition = $condition." and tc_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and tc_date <='{$e_date}'";
	   }
		
		$this -> selectByPage($condition);
		$this -> display();
		// 输出模板
	}

	/**
	 * 审核投产项目
	 */
	public function auditTcProjectUI($id = 0, $toPage = 'auditTcProjectMain',$flag = '', $add_dept = '',$s_date='',$e_date='') {
		$this -> assign('flag', $flag);
		$this -> assign('add_dept', $add_dept);
		$this -> assign('s_date', $s_date);
		$this -> assign('e_date', $e_date);
		
		$this -> findOneData($id, $toPage);
		$this -> display();
	}

	/**
	 * 查看项目信息
	 */
	public function seeProjectUI($id = 0, $toPage = '', $showNum = '') {
		$this -> assign('showNum', $showNum);
		//传递显示状态
		$this -> findOneData($id, $toPage);
		$this -> display();
	}

	
    //==============================分隔线=========================================
					
    //招商引资工作进度
	public function new_work_progress($s_date='',$e_date='',$qy_total_invest='5',$flag='审核通过'){
				
		if($s_date==''){
			$s_date = date('Ym');
		}	
		if($e_date==''){
			$e_date = date('Ym');
		}
		
		$this->assign('s_date',$s_date);	
		$this->assign('e_date',$e_date);	
		$this->assign('qy_total_invest',$qy_total_invest);	
		$this->assign('flag',$flag);	
					
		$kfq=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'开发区');
	    $this->assign('kfq',$kfq);
		$dy=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'大冶市');
	    $this->assign('dy',$dy);
		$yx=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'阳新县');
	    $this->assign('yx',$yx);
		$hsg=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'黄石港区');
	    $this->assign('hsg',$hsg);
		$xss=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'西塞山区');
	    $this->assign('xss',$xss);
		$xl=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'下陆区');
	    $this->assign('xl',$xl);
		$ts=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'铁山区');
	    $this->assign('ts',$ts);
	    
	  
		$this->display();
	}
	
	
	//通用函数
	public function work_progress($s_date='',$e_date='',$qy_total_invest='',$flag='',$add_dept=''){
		$object = M('Project');
		//开发区
	    $condition1 = "zc_date >= '{$s_date}' and zc_date <= '{$e_date}' and zc_status = '已注册' and zc_flag = '{$flag}' and add_dept = '{$add_dept}'";
	    $res1 = $object -> where($condition1) -> count();

	    $condition2 = "zc_date >= '{$s_date}' and zc_date <= '{$e_date}' and zc_status = '已注册' and zc_flag = '{$flag}' and add_dept = '{$add_dept}' and qy_total_invest>= {$qy_total_invest}";
	    $res2 = $object -> where($condition2) -> count();

	    $res3 = $object -> where($condition1) -> sum('qy_total_invest');

	    $res4 = $object -> where($condition1) -> sum('qy_first_invest');
	
	    $res5 = $object -> where($condition1) -> sum('zc_capital');
		$condition3 = "kg_date >= '{$s_date}' and kg_date <= '{$e_date}' and kg_status = '已开工' and zc_flag = '{$flag}' and add_dept = '{$add_dept}' and qy_total_invest>= {$qy_total_invest}";
	
	    $res6 = $object -> where($condition3) -> count();
		
		$condition4 = "tc_date >= '{$s_date}' and tc_date <= '{$e_date}' and tc_status = '已投产' and zc_flag = '{$flag}' and add_dept = '{$add_dept}' and qy_total_invest>= {$qy_total_invest}";
	    $res7 = $object -> where($condition4) -> count();

		$data['res1']=$res1;
		$data['res2']=$res2;
		$data['res3']=$res3;
		$data['res4']=$res4;
		$data['res5']=$res5;
		$data['res6']=$res6;
		$data['res7']=$res7;
		return $data;
	}
	
	
	//招商引资目标考核
	public function new_target_check($s_date='',$e_date='',$qy_total_invest='5',$flag='审核通过'){
		if($s_date==''){
			$s_date = date('Ym');
		}	
		if($e_date==''){
			$e_date = date('Ym');
		}
		
		$this->assign('s_date',$s_date);	
		$this->assign('e_date',$e_date);	
		$this->assign('qy_total_invest',$qy_total_invest);	
		$this->assign('flag',$flag);	
					
		$kfq=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'开发区');
	    $this->assign('kfq',$kfq);
		$dy=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'大冶市');
	    $this->assign('dy',$dy);
		$yx=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'阳新县');
	    $this->assign('yx',$yx);
		$hsg=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'黄石港区');
	    $this->assign('hsg',$hsg);
		$xss=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'西塞山区');
	    $this->assign('xss',$xss);
		$xl=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'下陆区');
	    $this->assign('xl',$xl);
		$ts=$this->work_progress($s_date,$e_date,$qy_total_invest,$flag,'铁山区');
	    $this->assign('ts',$ts);
	    
	  
		$this->display();
	}

    

}
