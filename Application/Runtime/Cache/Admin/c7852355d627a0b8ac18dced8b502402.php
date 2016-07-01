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
					产业链招商分局驻外招商汇总
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<!-- <button class="btn btn-danger" onclick="doAudit('zc_flag','认可')">
							认可
						</button>
						<button class="btn" onclick="doAudit('zc_flag','不认可')">
							不认可
						</button> -->
						审核状态:<select id="flag" name="flag">
							<option value="" <?php if(($flag) == ""): ?>selected<?php endif; ?>>-查询全部-</option>
							<option value="审核中" <?php if(($flag) == "审核中"): ?>selected<?php endif; ?>>审核中</option>
							<option value="认可" <?php if(($flag) == "认可"): ?>selected<?php endif; ?>>认可</option>
							<option value="未认可" <?php if(($flag) == "未认可"): ?>selected<?php endif; ?>>未认可</option>
						</select>
						时间：<input type="text" id="sdate" name="sdate" value="<?php echo ($sdate); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})"/>
						<button class="btn" onclick="doQuery()">查询</button>
						<!-- <button class="btn" onclick="doExcel()">导出到excel</button> -->
						
						
						<div class="btn-group"></div>
					</div>
					<div class="well">
						<table class="table">
							<thead>
								<tr>
									
									<th>产业链招商</th>
									<th>分局</th>
									<th>责任单位</th>
									<th>第一责任人驻外招商（天数）</th>
									<th>分局局长驻外招商 （天数）</th>
									<th class="span1"></th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td rowspan="2">高端装备制造及智能化模具产业链</td>
									<td>一分局</td>
									<td>市经信委</td>
									<td><?php echo ($count1_1_1); ?></td>
									<td><?php echo ($count1_1_2); ?></td>
								
								</tr>
								<tr>
									<!-- <td>高端装备制造及智能化模具产业链</td> -->
									<td>二分局</td>
									<td>市国资委</td>
									<td><?php echo ($count1_2_1); ?></td>
									<td><?php echo ($count1_2_2); ?></td>
									
								</tr>
								
								<!--  ================================================================  -->
								
								<tr>
									<td rowspan="2">特钢及汽车零部件产业链</td>
									<td>一分局</td>
									<td>市科技局</td>
									<td><?php echo ($count2_1_1); ?></td>
									<td><?php echo ($count2_1_2); ?></td>
									
								</tr>
								<tr>
									
									<td>二分局</td>
									<td>市财政局</td>
									<td><?php echo ($count2_2_1); ?></td>
									<td><?php echo ($count2_2_2); ?></td>
									
								</tr>
								
									<!--  ================================================================  -->
								
								<tr>
									<td rowspan="2">电子信息及新材料产业链</td>
									<td>一分局</td>
									<td>市商务委 （招商局）</td>
									<td><?php echo ($count3_1_1); ?></td>
									<td><?php echo ($count3_1_2); ?></td>
									
								</tr>
								<tr>
									
									<td>二分局</td>
									<td>市委统战部</td>
									<td><?php echo ($count3_2_1); ?></td>
									<td><?php echo ($count3_2_2); ?></td>
									
								</tr>
								
									<!--  ================================================================  -->
								
								<tr>
									<td rowspan="2">医药化工产业链</td>
									<td>一分局</td>
									<td>市卫计委</td>
									<td><?php echo ($count4_1_1); ?></td>
									<td><?php echo ($count4_1_2); ?></td>
									
								</tr>
								<tr>
									
									<td>二分局</td>
									<td>市食药监局</td>
									<td><?php echo ($count4_2_1); ?></td>
									<td><?php echo ($count4_2_2); ?></td>
									
								</tr>
								
									<!--  ================================================================  -->
								
								<tr>
									<td rowspan="2">现代服务业产业链</td>
									<td>一分局</td>
									<td>市商务委 （招商局）</td>
									<td><?php echo ($count5_1_1); ?></td>
									<td><?php echo ($count5_1_2); ?></td>
									
								</tr>
								<tr>
									
									<td>二分局</td>
									<td>市房产局</td>
									<td><?php echo ($count5_2_1); ?></td>
									<td><?php echo ($count5_2_2); ?></td>
								
								</tr>
								
									<!--  ================================================================  -->
								
								<tr>
									<td rowspan="2">节能环保及资源回收利用产业链</td>
									<td>一分局</td>
									<td>市发改委</td>
									<td><?php echo ($count6_1_1); ?></td>
									<td><?php echo ($count6_1_2); ?></td>
									
								</tr>
								<tr>
								
									<td>二分局</td>
									<td>市台办</td>
									<td><?php echo ($count6_2_1); ?></td>
									<td><?php echo ($count6_2_2); ?></td>
									
								</tr>

							</tbody>
						</table>
					</div>
					<ul class="pagination">
						<!-- <?php echo ($page); ?> -->
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
		    var zc_flag= $('#zc_flag').val();
			var zc_date= $('#zc_date').val();
			location.href="/grid_chi/index.php/Admin/Outside/excelCollectZcProject?zc_flag="+zc_flag+"&zc_date="+zc_date;
		//excelCollectZcProject
	}
	
	//查询
	    function doQuery(){
	    	var flag= $('#flag').val();
	    	var sdate= $('#sdate').val();
			location.href="/grid_chi/index.php/Admin/Outside/collectChainOutside?sdate="+sdate+"&flag="+flag;
		}
	
	</script>
</html>