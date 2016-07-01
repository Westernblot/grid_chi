<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

/**
 * 信息查询
 */
class SearchController extends AdminController {
   
   
  /**
	 * 组合查询
	 */
	 public function searchResult($names='',$fileds='',$status='',$flag='',$s_date='',$e_date='',$s_zc_capital='',$e_zc_capital='',$zc_industry_chain='',$trade='',$add_dept=''){
	 	$this->assign('names',$names);	
	 	$this->assign('fileds',$fileds);	
			
			
	 	$namesArr = explode(",", $names);
		$this->assign('namesArr',$namesArr);
		
	 	$filedsArr = explode(",", $fileds);
		$this->assign('filedsArr',$filedsArr);
		
		if($status=='已签约'){
			
			$condition = "qy_status='已签约' and qy_flag like '%{$flag}%'";
			if($s_date!=''){
				$condition = $condition." and qy_date >='{$s_date}'";
			}
			if($e_date!=''){
				$condition = $condition." and qy_date <='{$e_date}'";
			}
	
		}else if($status=='已注册'){
			
			$condition = "zc_status='已注册' and zc_flag like '%{$flag}%'";
			if($s_date!=''){
				$condition = $condition." and zc_date >='{$s_date}'";
			}
			if($e_date!=''){
				$condition = $condition." and zc_date <='{$e_date}'";
			}
			
		
		}else if($status=='已开工'){
			
			$condition = "kg_status='已开工' and kg_flag like '%{$flag}%'";
			if($s_date!=''){
				$condition = $condition." and kg_date >='{$s_date}'";
			}
			if($e_date!=''){
				$condition = $condition." and kg_date <='{$e_date}'";
			}
			
		
		}else if($status=='已投产'){
			
			$condition = "tc_status='已投产' and tc_flag like '%{$flag}%'";
			if($s_date!=''){
				$condition = $condition." and tc_date >='{$s_date}'";
			}
			if($e_date!=''){
				$condition = $condition." and tc_date <='{$e_date}'";
			}
			
		}
		
		//连接其他条件
		if($s_zc_capital!=''){
		   $condition = $condition." and zc_capital >= {$s_zc_capital}";	
		}
		if($e_zc_capital!=''){
		   $condition = $condition." and zc_capital <= {$e_zc_capital}";	
		}
		
		if($zc_industry_chain!=''){
			$condition = $condition." and zc_industry_chain = '{$zc_industry_chain}'";
		}
		if($trade!=''){
			$condition = $condition." and trade = '{$trade}'";
		}
		if($add_dept!=''){
			$condition = $condition." and add_dept = '{$add_dept}'";
		}
		
		$this->assign('condition',$condition); //回显查询条件
		
		$object = M('Project');
		$count = $object -> where($condition) -> count();
		// 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10);
		// 实例化分页类 传入总记录数和每页显示的记录数(25)

		$show = $Page -> show();
		// 分页显示输出
		$list = $object -> limit($Page -> firstRow . ',' . $Page -> listRows) ->field("{$fileds}")-> order('add_dept desc,id desc') -> where($condition) -> select();
		$this -> assign('list', $list);
		// 赋值数据集
		$this -> assign('page', $show);
		
		$this->assign('np',$Page -> firstRow);  //当前页
		$this->display();
	 	
	 	//var_dump($list);
	 	
	 }


      /**
	   * 导出查询结果
	   */
	   public function excelSearchResult($names='',$fileds='',$condition=''){
	   	$xlsName = "结果导出";
		
		$namesArr = explode(",", $names);
		
	 	$filedsArr = explode(",", $fileds);
        

		$xlsModel = new Model();

		$xlsData = $xlsModel -> query("select                                  
                                        (@rowNO := @rowNo+1) as no,
                                        {$fileds}
                                        from tp_project ,(select @rowNO :=0) b  where {$condition} order by add_dept desc,id desc");
		//var_dump($xlsData);
		fnExcelResult($xlsName, $namesArr,$filedsArr, $xlsData);
	  
	   }
  
	
}
