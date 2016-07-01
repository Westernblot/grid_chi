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
					产业链招商分局汇总
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						
						时间：<input type="text" id="all_date" name="all_date" value="<?php echo ($all_date); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})"/>
						<button class="btn" onclick="doQuery()">查询</button>
						
						<div class="btn-group"></div>
					</div>
					<div class="well">
						<table class="table">
							<thead>
								<tr>
									
									<th>单位</th>
									<th>类别</th>
									<th>新注册重点项目（个）</th>
									<th>新开工重点项目（个）</th>
									<th>新投产重点项目（个）</th>
									<th>实际到资总额</th>
									<th>其中：省外资金</th>
									
									<th class="span1"></th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td >开发区</td>
									<td rowspan="3">一类</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>大冶市</td>
									<!-- <td>一类</td> -->
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>阳新县</td>
									<!-- <td>一类</td> -->
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>黄石港区</td>
									<td rowspan="4">二类</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>西塞山区</td>
									<!-- <td>二类</td> -->
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>下陆区</td>
									<!-- <td>二类</td> -->
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>铁山区</td>
									<!-- <td>二类</td> -->
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
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
			location.href="/grid_chi/index.php/Admin/Project/excelCollectZcProject?zc_flag="+zc_flag+"&zc_date="+zc_date;
		//excelCollectZcProject
	}
	
	//查询
	    function doQuery(){
	    	var all_date= $('#all_date').val();
			location.href="/grid_chi/index.php/Admin/Project/collectXSQProject?all_date="+all_date;
		}
	
	</script>
</html>