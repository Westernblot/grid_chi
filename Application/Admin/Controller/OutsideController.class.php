<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

/**
 * 驻外招商 controller
 */
class OutsideController extends AdminController {

	/**
	 * 在谈项目一览
	 */
	public function outsideMain() {
		$outside = M('Outside');

		$condition = "add_dept='{$_SESSION['user']['dept']}'";
		$count = $outside -> where($condition) -> count();
		// 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10);
		// 实例化分页类 传入总记录数和每页显示的记录数(25)

		$show = $Page -> show();
		// 分页显示输出
		$list = $outside -> limit($Page -> firstRow . ',' . $Page -> listRows) -> order('id desc') -> where($condition) -> select();
		$this -> assign('list', $list);
		// 赋值数据集
		$this -> assign('page', $show);
		$this -> assign('np', $Page -> firstRow);
		//当前页
		// 赋值分页输出
		$this -> display();
		// 输出模板

	}

	/**
	 * 新增、编辑在谈项目
	 */
	public function outsideUI($id = 0, $toPage = 'outsideMain') {
		$object = M('Outside');
		$res = $object -> find($id);
		$this -> assign('mo', $res);
		$this -> assign('toPage', $toPage);

		$attachmentArr = explode(",", $res['attachment']);
		$attachment_urlArr = explode(",", $res['attachment_url']);
		$this -> assign('attachmentArr', $attachmentArr);
		$this -> assign('attachment_urlArr', $attachment_urlArr);

		$gpyArr = explode(",", $res['gpy']);
		$this -> assign('gpyArr', $gpyArr);

		//拜访信息
		$visit_companyArr = explode(",", $res['visit_company']);
		$this -> assign('visit_companyArr', $visit_companyArr);

		$vister_manArr = explode(",", $res['vister_man']);
		$this -> assign('vister_manArr', $vister_manArr);

		$vister_man_positionArr = explode(",", $res['vister_man_position']);
		$this -> assign('vister_man_positionArr', $vister_man_positionArr);

		$this -> display();
	}

	//----------------------------------分隔线----------------------------------------

	/**
	 * 增
	 */
	public function insert($toPage = '') {
		$object = M('Outside');
		$object -> create();
		$object -> add_id = $_SESSION['user']['id'];
		$object -> add_name = $_SESSION['user']['username'];
		$object -> add_dept = $_SESSION['user']['dept'];
		$object -> add_time = date('Y-m-d H:i:s');

		if (I('attachment_url')) {
			$attachment = implode(',', $_POST['attachment']);
			$attachment_url = implode(',', $_POST['attachment_url']);
			$object -> attachment = $attachment;
			$object -> attachment_url = $attachment_url;
		}

		if (I('gpy')) {
			$gpy = implode(',', $_POST['gpy']);
			$object -> gpy = $gpy;
		}

		//拜访信息
		if (I('visit_company')) {
			$visit_company = implode(',', $_POST['visit_company']);
			$vister_man = implode(',', $_POST['vister_man']);
			$vister_man_position = implode(',', $_POST['vister_man_position']);

			$object -> visit_company = $visit_company;
			$object -> vister_man = $vister_man;
			$object -> vister_man_position = $vister_man_position;
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
		$object = M('Outside');
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
		$object = M('Outside');
		$object -> create();

		if (I('attachment_url')) {
			$attachment = implode(',', $_POST['attachment']);
			$attachment_url = implode(',', $_POST['attachment_url']);
			$object -> attachment = $attachment;
			$object -> attachment_url = $attachment_url;
		}

		if (I('gpy')) {
			$gpy = implode(',', $_POST['gpy']);
			$object -> gpy = $gpy;
		}

		//拜访信息
		if (I('visit_company')) {
			$visit_company = implode(',', $_POST['visit_company']);
			$vister_man = implode(',', $_POST['vister_man']);
			$vister_man_position = implode(',', $_POST['vister_man_position']);

			$object -> visit_company = $visit_company;
			$object -> vister_man = $vister_man;
			$object -> vister_man_position = $vister_man_position;
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
	 * 提交、撤销审核
	 */
	public function chanageFlag($ids = '', $flag = '') {
		$model = new Model();
		// 实例化一个model对象 没有对应任何数据表
		$flag = $model -> execute("update tp_outside set flag='{$flag}' where id IN ({$ids})");
		//获取所有的权限菜单
		if ($flag > 0) {
			$this -> success('操作成功！');
		} else {
			$this -> error('操作失败!');
		}
	}

	/**
	 * 审核是否认可
	 */
	public function cmdOutsideAudit($id = 0, $fieldValue_flag = '', $opinion = '',$flag='',$add_dept='') {
		$this->assign('flag',$flag);
		$this->assign('add_dept',$add_dept);
		
		$model = new Model();
		// 实例化一个model对象 没有对应任何数据表
		$dateTime = date('Y-m-d H:i:s');
		$opinion = "审核状态：{$fieldValue_flag}；审核时间:{$dateTime}；审核人：{$_SESSION['user']['cnname']}；审核意见：{$opinion}<br>";
		$status = $model -> execute("update tp_outside set flag='{$fieldValue_flag}',opinion=CONCAT(opinion,'{$opinion}') where id ={$id}");
		if ($status > 0) {
			$this -> success('操作成功！', U('auditOutsideMain')."?flag={$flag}&add_dept={$add_dept}");
		} else {
			$this -> error('操作失败!');
		}
	}

	/**
	 * 驻外招商审核
	 */
	public function auditOutsideMain($flag = '', $add_dept = '') {

		$this -> assign('flag', $flag);
		$this -> assign('add_dept', $add_dept);

		$object = M('Outside');
		$condition = "flag like '%{$flag}%' and add_dept like '%{$add_dept}%'";

		$count = $object -> where($condition) -> count();
		// 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10);
		// 实例化分页类 传入总记录数和每页显示的记录数(25)

		$show = $Page -> show();
		// 分页显示输出
		$list = $object -> limit($Page -> firstRow . ',' . $Page -> listRows) -> order('sdate desc,id desc') -> where($condition) -> select();
		$this -> assign('list', $list);
		// 赋值数据集
		$this -> assign('page', $show);
		$this -> assign('np', $Page -> firstRow);
		//当前页
		// 赋值分页输出
		$this -> display();
		// 输出模板
	}

	/**
	 * 查看审核信息页面
	 */
	public function seeOutsideUI($id = 0) {
		$object = M('Outside');
		$res = $object -> find($id);
		$this -> assign('mo', $res);

		$attachmentArr = explode(",", $res['attachment']);
		$attachment_urlArr = explode(",", $res['attachment_url']);
		$this -> assign('attachmentArr', $attachmentArr);
		$this -> assign('attachment_urlArr', $attachment_urlArr);

		$gpyArr = explode(",", $res['gpy']);
		$this -> assign('gpyArr', $gpyArr);

		//拜访信息
		$visit_companyArr = explode(",", $res['visit_company']);
		$this -> assign('visit_companyArr', $visit_companyArr);

		$vister_manArr = explode(",", $res['vister_man']);
		$this -> assign('vister_manArr', $vister_manArr);

		$vister_man_positionArr = explode(",", $res['vister_man_position']);
		$this -> assign('vister_man_positionArr', $vister_man_positionArr);

		$this -> display();
	}

	/**
	 * 审核操作页面
	 */
	public function auditOutsideUI($id = 0,$flag = '', $add_dept = '') {
		$this->assign('flag',$flag);
		$this->assign('add_dept',$add_dept);
		
		$object = M('Outside');
		$res = $object -> find($id);
		$this -> assign('mo', $res);

		$attachmentArr = explode(",", $res['attachment']);
		$attachment_urlArr = explode(",", $res['attachment_url']);
		$this -> assign('attachmentArr', $attachmentArr);
		$this -> assign('attachment_urlArr', $attachment_urlArr);

		$gpyArr = explode(",", $res['gpy']);
		$this -> assign('gpyArr', $gpyArr);

		//拜访信息
		$visit_companyArr = explode(",", $res['visit_company']);
		$this -> assign('visit_companyArr', $visit_companyArr);

		$vister_manArr = explode(",", $res['vister_man']);
		$this -> assign('vister_manArr', $vister_manArr);

		$vister_man_positionArr = explode(",", $res['vister_man_position']);
		$this -> assign('vister_man_positionArr', $vister_man_positionArr);

		$this -> display();
	}

	//===========================分隔线====================================

	/**
	 * 驻外招商数据导出
	 */
	public function collectUI() {
		$this -> display();
	}

	/**
	 * 驻外招商数据报表导出
	 */
	public function outsideExcel($s_date = '', $e_date = '', $flag = '审核通过',$add_dept='') {
		$object = M('Outside');
	
		   $condition = "flag='{$flag}'";
	        
		   $add_depts=implode(',',$add_dept);
		   $add_depts = str_replace(",", "','", $add_depts);

		   if($add_depts!=''){
		   	 /// echo "mm".$add_depts;			   
			   $condition = $condition." and add_dept in ('{$add_depts}')";
		   }

		if ($s_date != '') {
			$condition = $condition . " and sdate >='{$s_date}'";
		}
		if ($e_date != '') {
			$condition = $condition . " and edate <='{$e_date}'";
		}
		
		$xlsName = "{$s_date}至{$e_date}县、市、区（开发区）外出招商情况上报表";
		$xlsCell = array(
		    array('add_dept', '单位'), 
		    array('no', '序号'),
		    array('name', '姓名'), 
		    array('position', '职务'), 
		    array('sdate', '开始时间'), 
		    array('edate', '结束时间'), 
		    array('num', '天数'), 
		    array('dest', '目的地'), 
		    array('visit_company', '拜访企业名称'),
		    array('visit_man', '接洽人姓名'), 
		    array('vister_man_position', '接洽人职务'));

		$xlsModel = new Model();

		$xlsData = $xlsModel -> query("select
                                        add_dept,
                                        (@rowNO := @rowNo+1) as no,
                                        name, 
		                                position, 
		                                sdate, 
		                                edate, 
		                                num, 
		                                dest, 
		                                visit_company,
		                                vister_man, 
		                                vister_man_position
                                        from tp_outside ,(select @rowNO :=0) b  where {$condition} order by add_dept desc,id desc limit 10");
		
		//var_dump($xlsData);
		
		 //重新排序
         $arr = array();
         $deptArr = array('开发区','大冶市','阳新县','黄石港区','西塞山区','下陆区','铁山区','市经信委','市国资委','市科技局','市财政局','市商务委','市委统战部','市卫计委','市食药监局','市商务委','市房产局','市发改委','市台办'); 
         $m=1;                              
         for($i=0;$i<count($deptArr);$i++){
         			
         		for($j=0;$j<count($xlsData);$j++){
         					
         				if($deptArr[$i]==$xlsData[$j]['add_dept']){
         					$xlsData[$j]['no']=$m;
         					array_push($arr,$xlsData[$j]);
         					$m++;
         				}
         		}
         }
		
		excelOutside($xlsName, $xlsCell, $arr);

	}

}
