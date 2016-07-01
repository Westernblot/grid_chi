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
					在谈项目一览表
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<button class="btn btn-danger pull-right" onclick="doDelete()">
							<img src="/grid_chi/Public/images/icon/cross.png"/> 删除
						</button>
						<a href="/grid_chi/index.php/Admin/Talk/talkUI" class="btn btn-primary">
							<img src="/grid_chi/Public/images/icon/plus.png"/> 添加项目</a>
						<!-- <button class="btn">
							导入
						</button>
						<button class="btn">
							导出
						</button> -->
					</div>
<div class="block-tab">
    <table class="table-mins">
							<thead>
								<tr>
									<th>
									<input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)">
									</th>
									<!-- <th>编号</th> -->
									<th>项目名称</th>
									<th>建设内容</th>
									<th>拟投资额[亿元]</th>
									<th>投资方</th>
									<th>行业</th>
									<th>拟建地点</th>
									<th>用地情况[亩]</th>
									<!-- <th>进展状态</th> -->
									<th>联系人</th>
									<th>职务</th>
									<th>电话</th>
									<th>跟踪人</th>
									<th>跟踪单位</th>
									<th>首次填报时间</th>
									<th colspan="2">操作</th>
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
		             <input type="checkbox" name="chk" id="chk">						
									    </td>
										<!-- <td><?php echo ($vo["id"]); ?></td> -->
										<td><?php echo ($vo["zt_project_name"]); ?></td>
										<td><?php echo ($vo["zt_build_content"]); ?></td>
										<td><?php echo ($vo["zt_plan_invest"]); ?></td>
										<td><?php echo ($vo["zt_investor"]); ?></td>
										<td><?php echo ($vo["zt_trade"]); ?></td>
										<td><?php echo ($vo["zt_plan_place"]); ?></td>
										<td><?php echo ($vo["zt_use_land"]); ?></td>
										<!-- <td><font color="red"><?php echo ($vo["zt_status"]); ?></font></td> -->
										<td><?php echo ($vo["zt_link_man"]); ?></td>
										<td><?php echo ($vo["zt_link_man_tel"]); ?></td>
										<td><?php echo ($vo["zt_link_man_position"]); ?></td>
										<td><?php echo ($vo["zt_track_man"]); ?></td>
										<td><?php echo ($vo["zt_track_dept"]); ?></td>
										<td><?php echo ($vo["first_add_time"]); ?></td>
										<td>
											<a href="/grid_chi/index.php/Admin/Talk/seetalkUI?id=<?php echo ($vo["id"]); ?>&showNum=1">查看</a></td>
										<td>
											<a href="/grid_chi/index.php/Admin/Talk/talkUI?id=<?php echo ($vo["id"]); ?>">编辑</a></td>
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
				location.href = '/grid_chi/index.php/Admin/Talk/delete?ids=' + ids;
			}
		}

		
	</script>
</html>