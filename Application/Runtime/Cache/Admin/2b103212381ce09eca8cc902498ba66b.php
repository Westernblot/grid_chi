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
					驻外招商一览表
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<a href="/grid_chi/index.php/Admin/Industry/industryUI" class="btn btn-primary"><img src="/grid_chi/Public/images/icon/plus.png"/> 新增</a>
						<!-- <button class="btn">
							导入
						</button>
						<button class="btn">
							导出
						</button> -->
						<button class="btn btn-danger pull-right" onclick="doDelete()">
							<img src="/grid_chi/Public/images/icon/cross.png"/> 删除
						</button>
						<div class="btn-group"></div>
					</div>
					<div class="well">
						<table class="table">
							<thead>
								<tr>
									<th>
									<input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)">
									</th>
									<th>项目名称或项目建设内容</th>
									<th>拟投资额（亿元）</th>
									<th>投资方</th>
									<th>省内资金</th>
									<th>省外资金</th>
									<th>外资</th>
									<th>用地面积（亩）</th>
									<th>项目进展状态</th>
									<th>责任领导</th>
									<th>备注</th>
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
										<td><?php echo ($vo["name_content"]); ?></td>
										<td><?php echo ($vo["plan_invest"]); ?></td>
										<td><?php echo ($vo["investor"]); ?></td>
										<td><?php echo ($vo["in_capital"]); ?></td>
										<td><?php echo ($vo["out_capital"]); ?></td>
										<td><?php echo ($vo["foreign_capital"]); ?></td>
										<td><?php echo ($vo["use_land"]); ?></td>
										<td><font color="red"><?php echo ($vo["status"]); ?></font></td>
										<td><?php echo ($vo["duty_leader"]); ?></td>
										<td><?php echo ($vo["remark"]); ?></td>
										<td>
											<a href="/grid_chi/index.php/Admin/Industry/industryUI?id=<?php echo ($vo["id"]); ?>">编辑</a>
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
	<script type="text/javascript" src="/grid_chi/Public/js/jquery.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>

	<script type="text/javascript">
		//删除
		function doDelete() {
			var ids = getId('delete');
			if (ids == false) {
				return;
			}
			//alert(ids);
			if (confirm("确定删除吗？")) {
				location.href = '/grid_chi/index.php/Admin/Industry/delete?ids=' + ids;
			}
		}

		
	</script>
</html>