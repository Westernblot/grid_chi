<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>添加用户</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<script type="text/javascript" src="/grid_chi/Public/js/tab-content.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/jquery.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>

		<script type="text/javascript">
			$(function() {
				var SDmodel = new scrollDoor();
				SDmodel.sd(["tab-home", "tab-profile", "tab-power"], ["home", "profile", "power"], "active", "normal");
			});

			//添加
			function selAdd(name, kind) {
				var name = $('#' + name).val();
				location.href = '/grid_chi/index.php/Admin/Zidian/insert?name=' + name + '&kind=' + kind;
			}

			//删除
			function selDelete(name) {
				var id = $("#" + name).val();
				if (confirm("确定删除吗？")) {
					location.href = '/grid_chi/index.php/Admin/Zidian/delete?id=' + id;
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
				<li>
					<a href="/grid_chi/index.php/Admin/User/userMain">系统用户管理</a><span class="divider">/</span>
				</li>
				<li class="active">
					数据字典
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div style="margin: 20px;">
						<div class="tab-content">

							<fieldset class="fieldset">
								<legend>
									<small>行业</small>
								</legend>
								<label for="diploma">新增字段：</label>
								<input name="trade_add" type="text" id="trade_add" style="width: 320px"/>
								<a href="javascript:selAdd('trade_add','行业')">添加</a>

								&nbsp;&nbsp;&nbsp;&nbsp;
								<select name="trade" id="trade" style="width: 320px">
									<?php if(is_array($list)): foreach($list as $key=>$vo): if(($vo["kind"]) == "行业"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
									<!-- <option>研究生</option>
									<option>其它</option> -->
								</select>
								<a href="javascript:selDelete('trade')">删除</a>
							</fieldset>

							<fieldset class="fieldset">
								<legend>
									<small>拟建地点</small>
								</legend>
								<label for="diploma">新增字段：</label>
								<input name="plan_place_add" type="text" id="plan_place_add" style="width: 320px"/>
								<a href="javascript:selAdd('plan_place_add','拟建地点')">添加</a>

								&nbsp;&nbsp;&nbsp;&nbsp;
								<select name="plan_place" id="plan_place" style="width: 320px">
									<?php if(is_array($list)): foreach($list as $key=>$vo): if(($vo["kind"]) == "拟建地点"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
								</select>
								<a href="javascript:selDelete('plan_place')">删除</a>
							</fieldset>

							<fieldset class="fieldset">
								<legend>
									<small>拟投资额</small>
								</legend>
								<label for="diploma">新增字段：</label>
								<input name="plan_invest_add" type="text" id="plan_invest_add" style="width: 320px"/>
								<a href="javascript:selAdd('plan_invest_add','拟投资额')">添加</a>

								&nbsp;&nbsp;&nbsp;&nbsp;
								<select name="plan_invest" id="plan_invest" style="width: 320px">
									<?php if(is_array($list)): foreach($list as $key=>$vo): if(($vo["kind"]) == "拟投资额"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
								</select>
								<a href="javascript:selDelete('plan_invest')">删除</a>
							</fieldset>

							<fieldset class="fieldset">
								<legend>
									<small>产业类别</small>
								</legend>
								<label for="diploma">新增字段：</label>
								<input name="industry_category_add" type="text" id="industry_category_add" style="width: 320px"/>
								<a href="javascript:selAdd('industry_category_add','产业类别')">添加</a>

								&nbsp;&nbsp;&nbsp;&nbsp;
								<select name="industry_category" id="industry_category" style="width: 320px">
									<?php if(is_array($list)): foreach($list as $key=>$vo): if(($vo["kind"]) == "产业类别"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
								</select>
								<a href="javascript:selDelete('industry_category')">删除</a>
							</fieldset>

							<fieldset class="fieldset">
								<legend>
									<small>所属产业链</small>
								</legend>
								<label for="diploma">新增字段：</label>
								<input name="industry_chain_add" type="text" id="industry_chain_add" style="width: 320px"/>
								<a href="javascript:selAdd('industry_chain_add','所属产业链')">添加</a>

								&nbsp;&nbsp;&nbsp;&nbsp;
								<select name="industry_chain" id="industry_chain" style="width: 320px">
									<?php if(is_array($list)): foreach($list as $key=>$vo): if(($vo["kind"]) == "所属产业链"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
								</select>
								<a href="javascript:selDelete('industry_chain')">删除</a>
							</fieldset>

							<fieldset class="fieldset">
								<legend>
									<small>审核意见</small>
								</legend>
								<label for="diploma">新增字段：</label>
								<input name="audit_opinion_add" type="text" id="audit_opinion_add" style="width: 320px"/>
								<a href="javascript:selAdd('audit_opinion_add','审核意见')">添加</a>

								&nbsp;&nbsp;&nbsp;&nbsp;
								<select name="audit_opinion" id="audit_opinion" style="width: 320px">
									<?php if(is_array($list)): foreach($list as $key=>$vo): if(($vo["kind"]) == "审核意见"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
								</select>
								<a href="javascript:selDelete('audit_opinion')">删除</a>
							</fieldset>

						</div>
					</div>
				</div>
			</div>
	</body>

</html>