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
					系统用户管理
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<a href="/grid_chi/index.php/Admin/User/userUI"  class="btn btn-primary"> <img src="/grid_chi/Public/images/icon/plus.png"/> 新增用户</a>
						<button class="btn" onclick="doResetPWD()">
							重置密码
						</button>
						<font color="red">提示：密码重置后全部为1</font>
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
					<div class="block-tab">
    <table class="table-mins">
							<thead>
								<tr>
									<th>
									<input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)" >
									</th>
									<th>登录名</th>
									<th>中文名</th>
									<th>部门</th>
									<th>职位</th>
									<th colspan="2">操作</th>
								</tr>
							</thead>
							<tbody>

								<?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>" <?php if(($k%2) == "0"): ?>class="odd"
										<?php else: ?>
										class="even"<?php endif; ?>>
										<td>
										<input type="checkbox" name="chk" id="chk" onclick="selTr(this);" >
										</td>
										<td><?php echo ($vo["username"]); ?></td>
										<td><?php echo ($vo["cnname"]); ?></td>
										<td><?php echo ($vo["dept"]); ?></td>
										<td><?php echo ($vo["position"]); ?></td>
										<td><a href="/grid_chi/index.php/Admin/User/userUI?id=<?php echo ($vo["id"]); ?>" class="tick-circle">编辑</a></td>
										<td><a href="/grid_chi/index.php/Admin/User/powerUI?id=<?php echo ($vo["id"]); ?>" class="minus-circle">设置权限</a></td>
									</tr><?php endforeach; endif; ?>

							</tbody>
							<tfoot>
						        <tr>
						          <td colspan="7" style=" padding:0;">
											<div class="block-foot">
											        <ul class="pagination pagination_ml pull-right">
											            <?php echo ($page); ?>
											        </ul>
											</div>
						          </td>
						        </tr>
						      </tfoot>
						</table>
					</div>

					<!-- <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
					</button>
					<h3 id="myModalLabel">Delete Confirmation</h3>
					</div>
					<div class="modal-body">
					<p class="error-text">
					<i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?
					</p>
					</div>
					<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">
					Cancel
					</button>
					<button class="btn btn-danger" data-dismiss="modal">
					Delete
					</button>
					</div>
					</div> -->

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
				location.href = '/grid_chi/index.php/Admin/User/delete?ids=' + ids;
			}
		}

		//重置密码
		function doResetPWD() {
			var ids = getId('delete');
			if (ids == false) {
				return;
			}
			//alert(ids);
			if (confirm("确定重置吗？")) {
				location.href = '/grid_chi/index.php/Admin/User/resetPWD?ids=' + ids;
			}
		}
	</script>

</html>