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
	   
		//删除
		function doDelete() {
			var ids = getId('delete');
			if (ids == false) {
				return;
			}
			//alert(ids);
			if (confirm("确定删除吗？")) {
				location.href = '/grid_chi/index.php/Admin/News/delete?ids=' + ids;
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
					通知公告
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<a href="/grid_chi/index.php/Admin/News/newsUI" class="btn btn-primary"><img src="/grid_chi/Public/images/icon/plus.png"/> 新增</a>　　
						
						<button class="btn btn-danger pull-right" onclick="doDelete()">
							<img src="/grid_chi/Public/images/icon/cross.png"/> 删除
						</button>
						<div class="btn-group"></div>
					</div>
					<div class="block-tab">
    <table class="table-mins">
							<thead>
								<tr>
									<th width="5%">								
									<input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)">
									</th>
									<th width="50%">标题</th>
									<th width="10%">发布时间</th>
									<th width="10%">添加人</th>
									<th width="10%" colspan="2">操作</th>
								</tr>
							</thead>
							<tbody>
                       <?php if(empty($list)): ?><tr>
							<td colspan="5" align="center"><font color="red">暂无记录</font></td>
						</tr><?php endif; ?>
								<?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>" <?php if(($k%2) == "0"): ?>class="odd"
										<?php else: ?>
										class="even"<?php endif; ?>>
										<td class="thcheckbox"><input type="checkbox" name="chk" id="chk" onclick="selTr(this);" ></td>
										<td><?php echo ($vo["title"]); ?></td>
										<td><?php echo ($vo["intime"]); ?></td>
										<td><?php echo ($vo["add_name"]); ?></td>
										<td>										
											<a href="/grid_chi/index.php/Admin/News/seeNewsUI?id=<?php echo ($vo["id"]); ?>">查看</a>
										</td>
										<td>										
											<a href="/grid_chi/index.php/Admin/News/newsUI?id=<?php echo ($vo["id"]); ?>">编辑</a>
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