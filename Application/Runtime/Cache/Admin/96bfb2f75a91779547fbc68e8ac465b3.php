<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<script type="text/javascript" src="/grid_chi/Public/js/jquery.js"></script>
		<script src="/grid_chi/Public/validate/jquery.js"></script>
    <script src="/grid_chi/Public/validate/jquery.validate.min.js"></script>
    <script src="/grid_chi/Public/validate/localization/messages_zh.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>

	<script type="text/javascript">
	     $().ready(function() {
                $("#form1").validate();
         });

	//导出到excel
	   function doExcel(){
	   	   var form1 = $('#form1');
	   	   
	   	   var tb_type = $('#tb_type').val();
	   	   if(tb_type=='新注册重点项目表'){
	   	   	   form1.attr('action','/grid_chi/index.php/Admin/Project/new_zc_zd_xm_excel');
	   	   	   
	   	   }else if(tb_type=='新开工重点项目表'){
	   	   	   form1.attr('action','/grid_chi/index.php/Admin/Project/new_kg_zd_xm_excel');
	   	   	
	   	   }else if(tb_type=='新投产重点项目表'){
	   	   	   form1.attr('action','/grid_chi/index.php/Admin/Project/new_tc_zd_xm_excel');
	   	   	
	   	   }else if(tb_type=='招商引资工作进度表'){
	   	   	   form1.attr('action','/grid_chi/index.php/Admin/Project/new_zc_zd_xm_excel');
	   	   	   
	   	   }else if(tb_type=='招商引资目标考核表'){
	   	   	   form1.attr('action','/grid_chi/index.php/Admin/Project/new_zc_zd_xm_excel');
	   	   }
	   	   
	   	   $('#form1').submit();
	   }

	</script>
	</head>

	<body>
		<div class="content">
			<ul class="breadcrumb">
				<li>
					<a href="/grid_chi/index.php/Admin/Index/main.html">首页</a><span class="divider">/</span>
				</li>
				<li class="active">
					项目汇总
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">						
						<form class="form-inline" id="form1" action="" method="post">								
						<input type="hidden" name="qy_total_invest" value="<?php echo ($qy_total_invest); ?>" size="3">
							<table>
								<tr>
									<td>
										导出表类型<font color="red">*</font>
									</td>
									<td>
										<select name="tb_type" id="tb_type" required >
											<option value="" <?php if(($tb_type) == ""): ?>selected<?php endif; ?>>-请选择-</option>
											<option value="新注册重点项目表" <?php if(($tb_type) == "新注册重点项目表"): ?>selected<?php endif; ?>>新注册重点项目表</option>
											<option value="新开工重点项目表" <?php if(($tb_type) == "新开工重点项目表"): ?>selected<?php endif; ?>>新开工重点项目表</option>
											<option value="新投产重点项目表" <?php if(($tb_type) == "新投产重点项目表"): ?>selected<?php endif; ?>>新投产重点项目表</option>
											<!-- <option value="招商引资工作进度表" <?php if(($tb_type) == "招商引资工作进度表"): ?>selected<?php endif; ?>>招商引资工作进度表</option>
											<option value="招商引资目标考核表" <?php if(($tb_type) == "招商引资目标考核表"): ?>selected<?php endif; ?>>招商引资目标考核表</option> -->
										</select>
									</td>
								</tr>
								<tr>
									<td>
										时间：
									</td>
									<td>
						<input type="text" id="s_date" name="s_date" value="<?php echo ($s_date); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" size="10" />
						至
						<input type="text" id="e_date" name="e_date" value="<?php echo ($e_date); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" size="10" />
									</td>
								</tr>
								
								<tr>
                                  <td>
                                                                                                             审核状态：
                                  </td>															
                                  <td>
						<select name="zc_flag" >							
							<option value="审核通过" <?php if(($zc_flag) == "审核通过"): ?>selected<?php endif; ?>>审核通过</option>
							<option value="审核未通过" <?php if(($zc_flag) == "审核未通过"): ?>selected<?php endif; ?>>审核未通过</option>
							<option value="审核中" <?php if(($zc_flag) == "审核中"): ?>selected<?php endif; ?>>审核中</option>
							<option value="已保存" <?php if(($zc_flag) == "已保存"): ?>selected<?php endif; ?>>已保存</option>
						</select>
                                  </td>
								</tr>
                               <tr>
                               	<td></td>
                               	<td>                            		
						<!-- <a class="btn" onclick="doQuery()">查询</a> -->
						<a class="btn" onclick="doExcel()">导出到excel</a>
                               	</td>
                               </tr>
						
							</table>	
						</form>
					</div>



				</div>
			</div>
		</div>
	</body>
	
</html>