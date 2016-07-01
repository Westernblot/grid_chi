<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
	</head>

	<body>
		<div class="content">
			<ul class="breadcrumb">
				<li>
					<a href="/grid_chi/index.php/Admin/Index/main.html">首页</a><span class="divider">/</span>
				</li>
				<li class="active">
					新开工项目汇总
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						
						审核状态:<select id="kg_flag" name="kg_flag">
							<option value="" <?php if(($kg_flag) == ""): ?>selected<?php endif; ?>>-查询全部-</option>
							<option value="审核中" <?php if(($kg_flag) == "审核中"): ?>selected<?php endif; ?>>审核中</option>
							<option value="认可" <?php if(($kg_flag) == "认可"): ?>selected<?php endif; ?>>认可</option>
							<option value="未认可" <?php if(($kg_flag) == "未认可"): ?>selected<?php endif; ?>>未认可</option>
						</select>
						时间：<input type="text" id="kg_date" name="kg_date" value="<?php echo ($kg_date); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})"/>
						<button class="btn" onclick="doQuery()">查询</button>
						<button class="btn" onclick="doExcel()">导出到excel</button>
						<div class="btn-group"></div>
					</div>
					<div class="well">
						<table class="table">
							<thead>
								<tr>
									<th>
									<input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)">
									</th>
									<th>编号</th>
									<th>投资方名称</th>
									<th>在黄注册名称</th>
									<th>注册时间</th>
									<th>法人代表</th>
									<th>注册资本（亿元）</th>
									<th>总投资额（亿元）</th>
									<th>一期投资额（亿元）</th>
									<th>投资方实际到资额（亿元）</th>
									<th>项目建设内容</th>
									<th>产业类别</th>
									<th>开工时间</th>
									<th>建设地点（注明园区）</th>
									<th>项目用地（亩）</th>
									<th>状态</th>
									<th>审核状态</th>
									<th class="span1">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</th>
								</tr>
							</thead>
							<tbody>

								<?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>">
										<td>
										<input type="checkbox" name="chk" id="chk">
										</td>
										<td><?php echo ($vo["id"]); ?></td>
										<td><?php echo ($vo["qy_outside_investor"]); ?></td>
										<td><?php echo ($vo["zc_hs_name"]); ?></td>
										<td><?php echo ($vo["zc_date"]); ?></td>
										<td><?php echo ($vo["zc_legal_person"]); ?></td>
										<td><?php echo ($vo["zc_capital"]); ?></td>
										<td><?php echo ($vo["qy_total_invest"]); ?></td>
										<td><?php echo ($vo["zc_first_invest"]); ?></td>
										<td><?php echo ($vo["kg_actual_in_invest"]); ?></td>
										<td><?php echo ($vo["qy_build_content"]); ?></td>
										<td><?php echo ($vo["qy_industry_category"]); ?></td>
										<td><?php echo ($vo["kg_date"]); ?></td>
										<td><?php echo ($vo["zc_build_place"]); ?></td>
										<td><?php echo ($vo["zc_user_land"]); ?></td>
										<td><font color="red"><?php echo ($vo["kg_status"]); ?></font></td>
										<td><font color="red"><?php echo ($vo["kg_flag"]); ?></font></td>
										<td>
											<a href="/grid_chi/index.php/Admin/Project/seeProjectUI?id=<?php echo ($vo["id"]); ?>">查看</a>
										</td>
									</tr><?php endforeach; endif; ?>

							</tbody>
						</table>
					</div>
					<ul class="pagination">
						<?php echo ($page); ?>
					</ul>

				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="/grid_chi/Public/js/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="/grid_chi/Public/js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>

	<script type="text/javascript">
		//导出到excel
	function doExcel(){
		    var kg_flag= $('#kg_flag').val();
			var kg_date= $('#kg_date').val();
			location.href="/grid_chi/index.php/Admin/Project/excelCollectKgProject?kg_flag="+kg_flag+"&kg_date="+kg_date;
	}
	
	//查询
	    function doQuery(){
			var kg_flag= $('#kg_flag').val();
			var kg_date= $('#kg_date').val();
			location.href="/grid_chi/index.php/Admin/Project/collectKgProject?kg_flag="+kg_flag+"&kg_date="+kg_date;
		}

		
	</script>
</html>