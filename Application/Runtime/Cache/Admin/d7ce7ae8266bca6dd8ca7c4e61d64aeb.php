<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<script type="text/javascript" src="/grid_chi/Public/js/jquery.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>

	<script type="text/javascript">
	   //提交审核、撤销提交
			function updateAudit(flag){
				var ids = getId('delete');
				if (ids == false) {
					return;
				}
				//alert(ids);
				if (confirm("确定操作吗？")) {
					location.href = "/grid_chi/index.php/Admin/Outside/chanageFlag?ids=" + ids+"&flag="+flag;
				}
			}
		//删除
		function doDelete() {
			var ids = getId('delete');
			if (ids == false) {
				return;
			}
			//alert(ids);
			if (confirm("确定删除吗？")) {
				location.href = '/grid_chi/index.php/Admin/Outside/delete?ids=' + ids;
			}
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
					驻外招商一览表
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<button class="btn btn-danger pull-right" onclick="doDelete()">
							<img src="/grid_chi/Public/images/icon/cross.png"/> 删除
						</button>
						<a href="/grid_chi/index.php/Admin/Outside/outsideUI" class="btn btn-primary"><img src="/grid_chi/Public/images/icon/plus.png"/> 新增</a>　　
						<a href="javascript:updateAudit('审核中')" class="btn btn-info"> 提交审核</a>
						<a href="javascript:updateAudit('已保存')" class="btn"> 撤销提交</a>
					</div>
					<div class="block-tab">
    <table class="table-mins">
							<thead>
								<tr>
									<th>								
									<input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)">
									</th>
									<th>招商领导类型</th>
									<th>部门</th>
									<th>姓名</th>
									
									<th>时间</th>
									<th>天数</th>
									<th>目的地</th>
									<th>拜访企业名称</th>
									<th>接洽人姓名</th>
									<th>接洽人职务</th>
									<th>状态</th>
									<th colspan="2">操作</th>
								</tr>
							</thead>
							<tbody>

                           <?php if(empty($list)): ?><tr>
							<td colspan="20" align="center"><font color="red">暂无记录</font></td>
						</tr><?php endif; ?>
								<?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>" 
									<?php if(($k%2) == "0"): ?>class="odd"
										<?php else: ?>
										class="even"<?php endif; ?> >
										<td>
											 <?php if(($vo["flag"]) != "审核通过"): ?><input type="checkbox" name="chk" id="chk"><?php endif; ?>
										</td>
										<td><?php echo ($vo["leader_type"]); ?></td>
										<td><?php echo ($vo["dept"]); ?></td>
										<td><?php echo ($vo["name"]); ?></td>
									
										<td><?php echo ($vo["sdate"]); ?></td>
										<td><?php echo ($vo["num"]); ?></td>
										<td><?php echo ($vo["dest"]); ?></td>
										<td><?php echo ($vo["visit_company"]); ?></td>
										<td><?php echo ($vo["vister_man"]); ?></td>
										<td><?php echo ($vo["vister_man_position"]); ?></td>
										<td><font color="red"><?php echo ($vo["flag"]); ?></font></td>
										<td>										
											<a href="/grid_chi/index.php/Admin/Outside/seeOutsideUI?id=<?php echo ($vo["id"]); ?>">查看</a>
										</td>
										<td>
											 <?php if(($vo["flag"]) != "审核通过"): ?><a href="/grid_chi/index.php/Admin/Outside/outsideUI?id=<?php echo ($vo["id"]); ?>">编辑</a><?php endif; ?>
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