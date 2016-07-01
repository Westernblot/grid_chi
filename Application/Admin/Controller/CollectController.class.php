<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

/**
 * 项目信息汇总
 */
class CollectController extends AdminController {
   
   
   /**
    * 县市区信息汇总
    */
    public function xsqCollectUI(){
		$this->display();
    }
   
   
     //新注册项目汇总导出到excel
    public function zcExcel($s_date='',$e_date=''){
	  	$this->assign('s_date',$s_date);
	  	$this->assign('e_date',$e_date);
		
	   	$condition = "zc_status='已注册' and zc_flag = '审核通过'";
		
		if($_SESSION['user']['dept']!='市局'){
			$condition = $condition." and add_dept = '{$_SESSION['user']['dept']}'";
		}
	   if($s_date!=''){
	   	 $condition = $condition." and zc_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and zc_date <='{$e_date}'";
	   }
	   
		$xlsName = "{$s_date}至{$e_date}县（市）区（开发区）新注册重点项目一览表";
		$xlsCell = array(
		    array('add_dept', '单位'), 
		    array('no', '序号'),
		    array('zc_hs_name', '在黄注册名称'), 
		    array('qy_outside_investor', '外来投资方名称'), 
		    array('zc_date', '注册时间'), 
		    array('zc_legal_person', '法人代表'), 
		    array('zc_capital', '注册资本(万元)'),
		    array('zc_operate_scope', '经营范围'),
		    array('qy_trade_type', '产业类别'), 
		    array('zc_industry_chain', '所属产业链'),
		    array('qy_total_invest', '总投资额[亿元]'), 
		    array('qy_first_invest', '一期投资额[亿元]'), 
		    array('qy_date', '合同签约时间'), 
		    array('zc_build_place', '建设地点(注明园区)'), 
		    array('zc_user_land', '项目用地(亩)'), 
		    array('zc_recommend_company', '项目引荐单位'),
		    array('zc_remark', '备注')); 

		$xlsModel = new Model();

		$xlsData = $xlsModel -> query("select
                                        add_dept,
                                        (@rowNO := @rowNo+1) as no,
                                       zc_hs_name, 
		                               qy_outside_investor,
		                               zc_date, 
		                               zc_legal_person, 
		                               zc_capital,
		                               zc_operate_scope,
		                               qy_trade_type, 
		                               zc_industry_chain,
		                               qy_total_invest, 
		                               qy_first_invest, 
		                               qy_date, 
		                               zc_build_place, 
		                               zc_user_land, 
		                               zc_recommend_company,
		                               zc_remark 
                                       from tp_project ,(select @rowNO :=0) b  where {$condition} order by add_dept desc,id desc");
         
         //重新排序
         $arr = array();
         $deptArr = array('开发区','大冶市','阳新县','黄石港区','西塞山区','下陆区','铁山区'); 
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
                                       
		exportExcel($xlsName, $xlsCell, $arr);
		
    }
   
   
   
     //新开工项目汇总导出到excel
    public function kgExcel($s_date='',$e_date=''){
	  	$this->assign('s_date',$s_date);
	  	$this->assign('e_date',$e_date);
		
	   	$condition = "kg_status='已开工' and kg_flag = '审核通过' ";
		
		if($_SESSION['user']['dept']!='市局'){
			$condition = $condition." and add_dept = '{$_SESSION['user']['dept']}'";
		}
	   if($s_date!=''){
	   	 $condition = $condition." and kg_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and kg_date <='{$e_date}'";
	   }
	   
		$xlsName = "{$s_date}至{$e_date}县（市）区（开发区）新开工重点项目一览表";
		$xlsCell = array(
		    array('add_dept', '单位'), 
		    array('no', '序号'),
		    array('zc_hs_name', '在黄注册名称'), 
		    array('qy_outside_investor', '外来投资方名称'), 
		    array('zc_date', '注册时间'), 
		    array('zc_legal_person', '法人代表'), 
		    array('zc_capital', '注册资本(万元)'),
		    array('qy_total_invest', '总投资额[亿元]'), 
		    array('qy_first_invest', '一期投资额[亿元]'), 
		    array('qy_build_content', '项目建设内容'), 
		    array('qy_trade_type', '产业类别'), 
		    array('kg_date', '开工时间'),
		    array('zc_build_place', '建设地点(注明园区)'), 
		    array('zc_recommend_company', '项目引荐单位'),
		    array('kg_remark', '备注')); 

		$xlsModel = new Model();

		$xlsData = $xlsModel -> query("select
                                        add_dept,
                                        (@rowNO := @rowNo+1) as no,
                                       zc_hs_name, 
		                               qy_outside_investor, 
		                               zc_date, 
		                               zc_legal_person, 
		                               zc_capital,
		                               qy_total_invest, 
		                               qy_first_invest, 
		                               qy_build_content, 
		                               qy_trade_type, 
		                               kg_date,
		                               zc_build_place, 
		                               zc_recommend_company,
		                               kg_remark
                                       from tp_project ,(select @rowNO :=0) b  where {$condition} order by add_dept desc,id desc");
         
         //重新排序
         $arr = array();
         $deptArr = array('开发区','大冶市','阳新县','黄石港区','西塞山区','下陆区','铁山区'); 
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
                                       
		exportExcel($xlsName, $xlsCell, $arr);
		
    }
    
    
     //新投产项目汇总导出到excel
    public function tcExcel($s_date='',$e_date=''){
	  	$this->assign('s_date',$s_date);
	  	$this->assign('e_date',$e_date);
		
	   	$condition = "tc_status='已投产' and tc_flag = '审核通过' ";
		
		if($_SESSION['user']['dept']!='市局'){
			$condition = $condition." and add_dept = '{$_SESSION['user']['dept']}'";
		}
	   if($s_date!=''){
	   	 $condition = $condition." and tc_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and tc_date <='{$e_date}'";
	   }
	   
		$xlsName = "{$s_date}至{$e_date}县（市）区（开发区）新投产重点项目一览表";
		$xlsCell = array(
		    array('add_dept', '单位'), 
		    array('no', '序号'),
		    array('zc_hs_name', '在黄注册名称'), 
		    array('qy_outside_investor', '外来投资方名称'), 
		    array('zc_legal_person', '法人代表'), 
		    array('zc_date', '注册时间'), 
		    array('zc_capital', '注册资本(万元)'),
		    array('qy_total_invest', '总投资额[亿元]'), 
		    array('tc_accumulative_in_invest', '累计实际到资总额[亿元]'), 
		    array('qy_build_content', '项目建设内容'),
		    array('qy_trade_type', '产业类别'), 
		    array('tc_date', '投产时间'), 
		    array('zc_build_place', '建设地点(注明园区)'), 
		    array('zc_user_land', '项目用地(亩)'), 
		    array('tc_remark', '备注'));
		   

		$xlsModel = new Model();

		$xlsData = $xlsModel -> query("select
                                        add_dept,
                                        (@rowNO := @rowNo+1) as no,
                                        zc_hs_name, 
		                                qy_outside_investor, 
		                                zc_legal_person, 
		                                zc_date, 
		                                zc_capital,
		                                qy_total_invest, 
		                                tc_accumulative_in_invest, 
		                                qy_build_content,
		                                qy_trade_type, 
		                                tc_date, 
		                                zc_build_place, 
		                                zc_user_land, 
		                                tc_remark
                                       from tp_project ,(select @rowNO :=0) b  where {$condition} order by add_dept desc,id desc");
         
         //重新排序
         $arr = array();
         $deptArr = array('开发区','大冶市','阳新县','黄石港区','西塞山区','下陆区','铁山区'); 
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
                                       
		exportExcel($xlsName, $xlsCell, $arr);
		
    }
    
    
    /**
	 * 党政主职驻外招商进度汇总表
	 */
	public function outsideExcel($s_date='',$e_date=''){
		$condition = "leader_type = '党政主职' and flag = '审核通过'";
					
		if($s_date!=''){
	   	 $condition = $condition." and sdate >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and edate <='{$e_date}'";
	   }
			
		$object = M('Outside');
			
		$monthArr = array();
		$addArr = array();
		$deptArr = array('开发区','大冶市','阳新县','黄石港区','西塞山区','下陆区','铁山区');
		for($i=0;$i<count($deptArr);$i++){
			$arr = $object->where($condition." and add_dept='{$deptArr[$i]}'")->sum('num');
			//var_dump($arr[0]);
			array_push($monthArr,$arr);
			
			$arr1 = $object->where("leader_type = '党政主职' and flag = '审核通过' and add_dept='{$deptArr[$i]}'")->sum('num');
			array_push($addArr,$arr1);
			
		}
		
		$title = "{$s_date}至{$e_date}县（市）区（开发区）党政主职驻外招商进度汇总表";
		//$monthArr = array('11','22','33','44','55','66','77','88');	
		//$addArr = array('111','222','333','444','555','666','777','888');	
			
		//var_dump($monthArr);
		//echo "======================";
		//var_dump($addArr);
		doOutsideExcel($title,$monthArr,$addArr);
	}
   
   
   
   /**
    * 2016年*月县、市、区（开发区）招商引资工作目标进度汇总表
    */
    public function zsyjProjectExcel($s_date='',$e_date=''){
    	$title="{$s_date}至{$e_date}县、市、区（开发区）招商引资工作目标进度汇总表";
		
		$object = M('Project');
		
		//------新注册项目
		$condition1 = "zc_status='已注册' and zc_flag = '审核通过' ";
	
	   if($s_date!=''){
	   	 $condition1 = $condition1." and zc_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition1 = $condition1." and zc_date <='{$e_date}'";
	   }
	   
		//------新开工项目
		$condition2 = "kg_status='已开工' and kg_flag = '审核通过' ";
	
	   if($s_date!=''){
	   	 $condition2 = $condition2." and kg_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition2 = $condition2." and kg_date <='{$e_date}'";
	   }
	   
		//------新投产项目
		$condition3 = "tc_status='已投产' and tc_flag = '审核通过' ";
	
	   if($s_date!=''){
	   	 $condition3 = $condition3." and tc_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition3 = $condition3." and tc_date <='{$e_date}'";
	   }
		
		
		
		$zcArr = array();
		$kgArr = array();
		$tcArr = array();

		$deptArr = array('开发区','大冶市','阳新县','黄石港区','西塞山区','下陆区','铁山区');
		for($i=0;$i<count($deptArr);$i++){		
			$arr1 = $object -> where($condition1." and add_dept='{$deptArr[$i]}'") -> count();
			array_push($zcArr,$arr1);
			
			$arr2 = $object -> where($condition2." and add_dept='{$deptArr[$i]}'") -> count();
			array_push($kgArr,$arr2);
			
			$arr3 = $object -> where($condition3." and add_dept='{$deptArr[$i]}'") -> count();
			array_push($tcArr,$arr3);
			
		}
		
		
		//var_dump($zcArr);
		
    	doZsyjExcel($title,$zcArr,$kgArr,$tcArr);
    }
   
   //=========================分隔线==================================
   
   /**
    * 产业链分局汇总
    */
    public function cylfjCollectUI(){
    	$this->display();
    }
    
    
    /**
	 * 新开工重点项目一览表
	 */
	 public function fjKgExcel($s_date='',$e_date=''){
	  	$this->assign('s_date',$s_date);
	  	$this->assign('e_date',$e_date);
		
	   	$condition = "kg_status='已开工' and kg_flag = '审核通过'";
		
		if($_SESSION['user']['dept']!='市局'){
			$condition = $condition." and add_dept = '{$_SESSION['user']['dept']}'";
		}
	   if($s_date!=''){
	   	 $condition = $condition." and kg_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and kg_date <='{$e_date}'";
	   }
	   
		$xlsName = "{$s_date}至{$e_date}招商分局新开工重点项目一览表";
		$xlsCell = array(
		    array('no', '序号'),
		    array('zc_recommend_company', '引荐单位'),
		    array('zc_hs_name', '在黄注册名称'), 
		    array('qy_outside_investor', '外来投资方名称'), 
		    array('zc_legal_person', '法人代表'), 
		    array('zc_date', '注册时间'), 
		    array('zc_capital', '注册资本(万元)'),
		    array('qy_total_invest', '总投资额[亿元]'), 
		    array('qy_first_invest', '一期投资额[亿元]'), 
		    array('qy_build_content', '项目建设内容'), 
		    array('qy_trade_type', '产业类别'), 
		    array('kg_date', '开工时间'),
		    array('zc_build_place', '建设地点(注明园区)'), 
		    array('zc_user_land', '项目用地(亩)'), 
		    array('kg_remark', '备注')); 

		$xlsModel = new Model();

		$xlsData = $xlsModel -> query("select                                   
                                        (@rowNO := @rowNo+1) as no,
                                       zc_recommend_company,
		                               zc_hs_name, 
		                               qy_outside_investor, 
		                               zc_legal_person, 
		                               zc_date, 
		                               zc_capital,
		                               qy_total_invest, 
		                               qy_first_invest, 
		                               qy_build_content, 
		                               qy_trade_type, 
		                               kg_date,
		                               zc_build_place, 
		                               zc_user_land, 
		                               kg_remark
                                       from tp_project ,(select @rowNO :=0) b  where {$condition} order by add_dept desc,id desc");
         
         //重新排序
         $arr = array();
         $deptArr = array('市经信委','市国资委','市科技局','市财政局','市商务委','市委统战部','市卫计委','市食药监局','市商务委','市房产局','市发改委','市台办'); 
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
                                       
		xylfjExportExcel($xlsName, $xlsCell, $arr);
		
    }
    
     //新注册项目汇总导出到excel
    public function fjZcExcel($s_date='',$e_date=''){
	  	$this->assign('s_date',$s_date);
	  	$this->assign('e_date',$e_date);
		
	   	$condition = "zc_status='已注册' and zc_flag = '审核通过'";
		
		if($_SESSION['user']['dept']!='市局'){
			$condition = $condition." and add_dept = '{$_SESSION['user']['dept']}'";
		}
	   if($s_date!=''){
	   	 $condition = $condition." and zc_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and zc_date <='{$e_date}'";
	   }
	   
		$xlsName = "{$s_date}至{$e_date}产业链招商分局新注册重点项目一览表";
		$xlsCell = array(
		    array('no', '序号'),
		    array('zc_recommend_company', '引荐单位'),
		    array('zc_hs_name', '在黄注册名称'), 
		    array('qy_outside_investor', '外来投资方名称'), 
		    array('zc_date', '注册时间'), 
		    array('zc_legal_person', '法人代表'), 
		    array('zc_capital', '注册资本(万元)'),
		    array('qy_build_content', '项目建设内容'),
		    array('qy_trade_type', '产业类别'), 
		    array('zc_industry_chain', '所属产业链'),
		    array('qy_total_invest', '总投资额[亿元]'), 
		    array('qy_first_invest', '一期投资额[亿元]'), 
		    array('qy_date', '签约时间'), 
		    array('zc_build_place', '建设地点(注明园区)'), 
		    array('zc_user_land', '项目用地(亩)'), 
		    array('zc_remark', '备注')); 

		$xlsModel = new Model();

		$xlsData = $xlsModel -> query("select                                    
                                        (@rowNO := @rowNo+1) as no,
                                      zc_recommend_company,
		                              zc_hs_name, 
		                              qy_outside_investor, 
		                              zc_date, 
		                              zc_legal_person, 
		                              zc_capital,
		                              qy_build_content,
		                              qy_trade_type, 
		                              zc_industry_chain,
		                              qy_total_invest, 
		                              qy_first_invest, 
		                              qy_date, 
		                              zc_build_place, 
		                              zc_user_land, 
		                              zc_remark 
                                       from tp_project ,(select @rowNO :=0) b  where {$condition} order by add_dept desc,id desc");
         
         //重新排序
         $arr = array();
         $deptArr = array('市经信委','市国资委','市科技局','市财政局','市商务委','市委统战部','市卫计委','市食药监局','市商务委','市房产局','市发改委','市台办'); 
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
                                       
		xylfjExportExcel($xlsName, $xlsCell, $arr);
		
    }
    
    
    /**
	 * 2016年*月产业链招商分局工作目标情况汇总表
	 */
	 public function destCollect($s_date='',$e_date=''){
	 	$title = "{$s_date}至{$e_date}产业链招商分局工作目标情况汇总表";
		$EArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	    //$FArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	    $HArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	    //$IArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	    $KArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	    //$LArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	    
	    
	    $object = M('Project');
		
		//------新注册项目
		$condition = "zc_status='已注册' and zc_flag = '审核通过' ";
	
	   if($s_date!=''){
	   	 $condition = $condition." and zc_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and zc_date <='{$e_date}'";
	   }
	   
		//------新开工项目
		$condition_ = "kg_status='已开工' and kg_flag = '审核通过' ";
	
	   if($s_date!=''){
	   	 $condition_ = $condition_." and kg_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition_ = $condition_." and kg_date <='{$e_date}'";
	   }
	   
		
	    
	    $FArr = array();
		$IArr = array();
		$LArr = array();

		$deptArr = array('市经信委','市国资委','市科技局','市财政局','市商务委','市委统战部','市卫计委','市食药监局','市商务委','市房产局','市发改委','市台办'); 
		for($i=0;$i<count($deptArr);$i++){
				
			if($i==0 || $i==1){
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '高端装备制造及智能化模具产业链' and qy_total_invest > 0.5";
			    $arr1 = $object -> where($condition1) -> count();
			    array_push($FArr,$arr1);
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '高端装备制造及智能化模具产业链' and qy_total_invest > 1";
			    $arr2 = $object -> where($condition1) -> count();
			    array_push($IArr,$arr2);
			    
				$condition2 = $condition_." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '高端装备制造及智能化模具产业链'";
			    $arr3 = $object -> where($condition2) -> count();
			    array_push($LArr,$arr3);
			    
			}else if($i==2 || $i==3){
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '特钢及汽车零部件产业链' and qy_total_invest > 0.5";
			    $arr1 = $object -> where($condition1) -> count();
			    array_push($FArr,$arr1);
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '特钢及汽车零部件产业链' and qy_total_invest > 1";
			    $arr2 = $object -> where($condition1) -> count();
			    array_push($IArr,$arr2);
			    
				$condition2 = $condition_." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '特钢及汽车零部件产业链'";
			    $arr3 = $object -> where($condition2) -> count();
			    array_push($LArr,$arr3);
			    
			}else if($i==4 || $i==5){
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '电子信息及新材料产业链' and qy_total_invest > 0.5";
			    $arr1 = $object -> where($condition1) -> count();
			    array_push($FArr,$arr1);
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '电子信息及新材料产业链' and qy_total_invest > 1";
			    $arr2 = $object -> where($condition1) -> count();
			    array_push($IArr,$arr2);
			    
				$condition2 = $condition_." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '电子信息及新材料产业链'";
			    $arr3 = $object -> where($condition2) -> count();
			    array_push($LArr,$arr3);
			    
				
			}else if($i==6 || $i==7){
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '医药化工产业链' and qy_total_invest > 0.5";
			    $arr1 = $object -> where($condition1) -> count();
			    array_push($FArr,$arr1);
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '医药化工产业链' and qy_total_invest > 1";
			    $arr2 = $object -> where($condition1) -> count();
			    array_push($IArr,$arr2);
			    
				$condition2 = $condition_." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '医药化工产业链'";
			    $arr3 = $object -> where($condition2) -> count();
			    array_push($LArr,$arr3);
			    
				
			}else if($i==8 || $i==9){
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '现代服务产业链' and qy_total_invest > 0.5";
			    $arr1 = $object -> where($condition1) -> count();
			    array_push($FArr,$arr1);
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '现代服务产业链' and qy_total_invest > 1";
			    $arr2 = $object -> where($condition1) -> count();
			    array_push($IArr,$arr2);
			    
				$condition2 = $condition_." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '现代服务产业链'";
			    $arr3 = $object -> where($condition2) -> count();
			    array_push($LArr,$arr3);
			    
				
			}else if($i==10 || $i==11){
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '节能环保及资源回收利用产业链' and qy_total_invest > 0.5";
			    $arr1 = $object -> where($condition1) -> count();
			    array_push($FArr,$arr1);
				
				$condition1 = $condition." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '节能环保及资源回收利用产业链' and qy_total_invest > 1";
			    $arr2 = $object -> where($condition1) -> count();
			    array_push($IArr,$arr2);
			    
				$condition2 = $condition_." and add_dept='{$deptArr[$i]}' and zc_industry_chain = '节能环保及资源回收利用产业链'";
			    $arr3 = $object -> where($condition2) -> count();
			    array_push($LArr,$arr3);
			    
			}	
			
			
			
		}
		
		//var_dump($FArr);
		//var_dump($IArr);
		//var_dump($LArr);
	    
	   doDestCollectExcel($title,$EArr,$FArr,$HArr,$IArr,$KArr,$LArr);
	 }
	
	
	
	/**
	 * 2016年*月产业链招商分局驻外招商进度汇总表
	 */
	 public function  cylOutsideCollect($s_date='',$e_date=''){
	   $title = "{$s_date}至{$e_date}产业链招商分局驻外招商进度汇总表";
	   if($s_date!=''){
	   	 $condition = $condition." and zc_date >='{$s_date}'";
	   }
	   if($e_date!=''){
	   	 $condition = $condition." and zc_date <='{$e_date}'";
	   }
	   
	 
	$EArr = array('1','1','1','1','1','1','1','1','1','1','1');
	$FArr = array('1','1','1','1','1','1','1','1','1','1','1');
	$GArr = array('1','1','1','1','1','1','1','1','1','1','1');
	$HArr = array('1','1','1','1','1','1','1','1','1','1','1');
	   
	   doCylOutsideCollect($title,$EArr,$FArr,$GArr,$HArr);
		
	 }
	
}
