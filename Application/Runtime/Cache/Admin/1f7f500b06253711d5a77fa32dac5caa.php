<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>添加用户</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<script type="text/javascript" src="/grid_chi/Public/js/tab-content.js"></script>
		<script type="text/javascript">
			window.onload = function() {
				var SDmodel = new scrollDoor();
				SDmodel.sd(["tab-home", "tab-profile", "tab-power"], ["home", "profile", "power"], "active", "normal");
			}
		</script>
	</head>

	<body>
		<div class="content">

			<ul class="breadcrumb">
				<li>
					<a href="/grid_chi/index.php/Admin/Index/main.html">首页</a><span class="divider">/</span>
				</li>
				<li>
					<a href="/grid_chi/index.php/Admin/User/userMain">系统用户管理</a><span class="divider">/</span>
				</li>
				<li class="active">
					新增用户
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<button class="btn btn-primary" onclick="saveForm()">
							<img src="/grid_chi/Public/images/icon/clipboard.png" class="clipboard"/> 保存
						</button>
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div>
					<div class="well">
						<div class="tab-content">
							<div class="tab-pane" id="home">
								<form id="form1" action="<?php echo ($mo==null?'/grid_chi/index.php/Admin/User/insert':'/grid_chi/index.php/Admin/User/update'); ?>" method="post">
									<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>" >
									<label><span class="text-block">登陆名<font color="red">*</font></span></label>
									<input type="text" name="username" value="<?php echo ($mo["username"]); ?>" class="input-xlarge" want="yes" title="登陆名"
									<?php if(!empty($mo)): ?>readOnly<?php endif; ?>
									>
									<label><span class="text-block">中文名<font color="red">*</font></span></label>
									<input type="text" name="cnname" value="<?php echo ($mo["cnname"]); ?>" class="input-xlarge" want="yes" title="中文名" >
									<label><span class="text-block">部门<font color="red">*</font></span></label>
									<input type="text" name="dept" value="<?php echo ($mo["dept"]); ?>" class="input-xlarge" want="yes" title="部门" >
									<label><span class="text-block">职位<font color="red">*</font></span></label>
									<input type="text" name="position" value="<?php echo ($mo["position"]); ?>" class="input-xlarge" want="yes" title="职位" >
									<?php if(empty($mo)): ?><label><span class="text-block">密码<font color="red">*</font></span></label>
										<input type="text" name="password" value="" class="input-xlarge" want="yes" title="密码" ><?php endif; ?>
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
		function saveForm() {
			var checked = checkForm('#form1');
			if (checked == false) {
				return;
			}
			$('#form1').submit();
		}
	</script>

</html>