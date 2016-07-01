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

	//查询
	   function doQuery(){
	   	   $('#form1').attr('action','/grid_chi/index.php/Admin/Project/new_kg_zd_xm');
	   	   $('#form1').submit();
	   } 
	
	//导出到excel
	   function doExcel(){
	   	   $('#form1').attr('action','/grid_chi/index.php/Admin/Project/new_kg_zd_xm_excel');
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
					新开工重点项目汇总
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">						
						<form class="form-inline" id="form1" action="" method="post">		
						开工时间：
						<input type="text" id="s_date" name="s_date" value="<?php echo ($s_date); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" size="10" />
						至
						<input type="text" id="e_date" name="e_date" value="<?php echo ($e_date); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" size="10" />
						总投资额大于等于[亿]:<input type="number" name="qy_total_invest" value="<?php echo ($qy_total_invest); ?>" size="3">
						审核状态：<select name="kg_flag" >
							<option value="" <?php if(($kg_flag) == ""): ?>selected<?php endif; ?>>-查询所有-</option>
							<option value="审核通过" <?php if(($kg_flag) == "审核通过"): ?>selected<?php endif; ?>>审核通过</option>
							<option value="审核未通过" <?php if(($kg_flag) == "审核未通过"): ?>selected<?php endif; ?>>审核未通过</option>
							<option value="审核中" <?php if(($kg_flag) == "审核中"): ?>selected<?php endif; ?>>审核中</option>
							<option value="已保存" <?php if(($kg_flag) == "已保存"): ?>selected<?php endif; ?>>已保存</option>
						</select>
						<a class="btn" onclick="doQuery()">查询</a>
						<a class="btn" onclick="doExcel()">导出到excel</a>
						
						</form>
					</div>
<div class="block-tab">
    <table class="table-mins">
							<thead>
								<tr>
									<th>单位</th>
									<th>序号</th>
									<th>报送时间</th>
									<th>外来投资方名称</th>
									<th>在黄注册名称</th>
									<th>注册时间</th>
									<th>法人代表</th>
									<th>注册资本[万元]</th>
									<th>总投资额[亿元]</th>
									<th>一期投资额[亿元]</th>
									<th>投资方实际到资额[亿元]</th>
									<th>项目建设内容</th>
									<th>产业类别</th>
									<th>开工时间</th>
									<th>建设地点[注明园区]</th>
									<th>项目用地[亩]</th>
									<th>审核结果</th>
									<th>备注</th>
									<th >操作</th>
								</tr>
							</thead>
							<tbody>
								
					    <?php if(empty($list)): ?><tr>
							<td colspan="20" align="center"><font color="red">查无数据</font></td>
						</tr><?php endif; ?>

								<?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>" <?php if(($k%2) == "0"): ?>class="odd"
										<?php else: ?>
										class="even"<?php endif; ?>>
										<td>
											<?php echo ($vo["add_dept"]); ?>
										</td>
										<td><?php echo ($np+$k+1); ?></td>
										<td><?php echo (substr($vo["add_time"],0,10)); ?></td>
										<td><?php echo ($vo["qy_outside_investor"]); ?></td>
										<td><?php echo ($vo["zc_hs_name"]); ?></td>
										<td><?php echo ($vo["zc_date"]); ?></td>
										<td><?php echo ($vo["zc_legal_person"]); ?></td>
										<td><?php echo ($vo["zc_capital"]); ?></td>
										<td><?php echo ($vo["qy_total_invest"]); ?></td>
										<td><?php echo ($vo["qy_first_invest"]); ?></td>
										<td><?php echo ($vo["kg_actual_in_invest"]); ?></td>
										<td><?php echo ($vo["qy_build_content"]); ?></td>
										<td><?php echo ($vo["qy_industry_category"]); ?></td>
										<td><?php echo ($vo["kg_date"]); ?></td>
										<td><?php echo ($vo["zc_build_place"]); ?></td>
										<td><?php echo ($vo["zc_user_land"]); ?></td>
										<td><?php echo ($vo["kg_flag"]); ?></td>
										<td><?php echo ($vo["kg_remark"]); ?></td>								
										<td>
											<a href="/grid_chi/index.php/Admin/Project/seeProjectUI?id=<?php echo ($vo["id"]); ?>&showNum=4">查看</a>
										</td>                                        
									</tr><?php endforeach; endif; ?>

			</tbody>
						</table>
					</div>

											<div class="block-foot">
											        <div class="pagination">
											            <?php echo ($page); ?>
											        </div>
											</div>

				</div>
			</div>
		</div>
	</body>
	
</html>