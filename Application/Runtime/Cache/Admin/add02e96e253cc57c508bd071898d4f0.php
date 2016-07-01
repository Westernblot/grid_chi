<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>修改密码</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<script type="text/javascript" src="/grid_chi/Publicjs/tab-content.js"></script>
		<script type="text/javascript">
			window.onload = function() {
				var SDmodel = new scrollDoor();
				SDmodel.sd(["tab-home", "tab-other"], ["home", "other"], "active", "normal");
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
					修改密码
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<button class="btn btn-primary" onclick="subForm()">
							<img src="/grid_chi/Public/images/icon/clipboard.png" class="clipboard"/> 保存
						</button>
						<div class="btn-group"></div>
					</div>
					<div class="well">
						<div class="block-body">
							<form id="form1" action="/grid_chi/index.php/Admin/User/updatePwd" method="post">
								<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>">
							<fieldset>
								<legend>
									<small>用户：<?php echo ($mo["username"]); ?></small>
								</legend>
								<label><span class="text-block">新密码<font color="red">*</font></span></label>
								<input type="text" name="password" value=""  want="yes" title="新密码">
								<br/>
								<label><span class="text-block">重复新密码<font color="red">*</font></span></label>
								<input type="text" name="repassword" value=""  want="yes" title="重复新密码">
							</fieldset>
							</form>
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
		function subForm() {
			var checked = checkForm('#form1');
			if (checked == false) {
				return;
			}
			$('#form1').submit();
		}
	</script>
</html>