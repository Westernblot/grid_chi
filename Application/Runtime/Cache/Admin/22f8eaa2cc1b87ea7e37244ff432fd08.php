<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/js/combo/dhtmlxcombo.css"/>
		<script src="/grid_chi/Public/js/combo/dhtmlxcombo.js"></script>
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
	</head>

	<body>
		<div class="content">
			<ul class="breadcrumb">
				<li>
					<a href="/grid_chi/index.php/Admin/Index/main.html">首页</a><span class="divider">/</span>
				</li>
				<li>
					<a href="/grid_chi/index.php/Admin/Project/ztProjectMain">在谈项目一览表</a><span class="divider">/</span>
				</li>
				<li class="active">
					添加项目
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">
					<div class="btn-toolbar">
						
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div>
					<div class="well you-bg">
						<form id="form1" action="<?php echo ($mo==null?'/grid_chi/index.php/Admin/Talk/insert':'/grid_chi/index.php/Admin/Talk/update'); ?>?toPage=<?php echo ($toPage); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>" />
							<input type="hidden" name="zt_status" value="在谈" />
							
							 <!-- 在谈项目模板 -->
						     <table class="youAdd tabAudit">
	<tr>
		<td class="TDleft"><label>在谈项目名称：</label></td>
		<td colspan="3">
		<?php echo ($mo["zt_project_name"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>在谈建设内容：</label></td>
		<td width="30%">
		<?php echo ($mo["zt_build_content"]); ?>
		</td>
		<td class="TDleft"><label>拟投资额：</label></td>
		<td>
			<?php echo ($mo["zt_plan_invest"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>在谈投资方：</label></td>
		<td>
		<?php echo ($mo["zt_investor"]); ?>
		</td>
		<td class="TDleft"><label>行业：</label></td>
		<td>
			<?php echo ($mo["zt_trade"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>拟建地点：</label></td>
		<td>
		<?php echo ($mo["zt_plan_place"]); ?>
		</td>
		<td class="TDleft"><label>用地情况（亩）：</label></td>
		<td>
		<?php echo ($mo["zt_use_land"]); ?>
		</td>
	</tr>
	<tr>
		<!-- <td class="TDleft"><label>进展状态：</label></td>
		<td>
		<input type="text" name="zt_status" value="<?php echo ($mo["zt_status"]); ?>" class="input-xlarge">
		</td> -->
		<td class="TDleft"><label>联系人：</label></td>
		<td colspan="3">
		<?php echo ($mo["zt_link_man"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>联系人职务：</label></td>
		<td>
		<?php echo ($mo["zt_link_man_position"]); ?>
		</td>
		<td class="TDleft"><label>联系人电话：</label></td>
		<td>
		<?php echo ($mo["zt_link_man_tel"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>跟踪人：</label></td>
		<td>
		<?php echo ($mo["zt_track_man"]); ?>
		</td>
		<td class="TDleft"><label>跟踪单位：</label></td>
		<td>
		<?php echo ($mo["zt_track_dept"]); ?>
		</td>
	</tr>
</table>
						  
						</form>
					</div>

				</div>
			</div>
		</div>
	</body>
	
</html>