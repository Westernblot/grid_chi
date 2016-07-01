<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/js/combo/dhtmlxcombo.css"/>
		<script src="/grid_chi/Public/js/combo/dhtmlxcombo.js"></script>
	<script src="/grid_chi/Public/validate/jquery.js"></script>
    <script src="/grid_chi/Public/validate/jquery.validate.min.js"></script>
    <script src="/grid_chi/Public/validate/localization/messages_zh.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>

	<script type="text/javascript">
	   
	   $().ready(function() {
         $("#form1").validate();
       });
	
		function saveForm() {		
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
						<button class="btn btn-primary" onclick="saveForm()">
							<img src="/grid_chi/Public/images/icon/clipboard.png" class="clipboard"/> 保存
						</button>
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div>
					<div class="well you-bg">
						<form id="form1" action="<?php echo ($mo==null?'/grid_chi/index.php/Admin/Talk/insert':'/grid_chi/index.php/Admin/Talk/update'); ?>?toPage=<?php echo ($toPage); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>" />
							<input type="hidden" name="zt_status" value="在谈" />
							
							 <!-- 在谈项目模板 -->
						     <table class="youAdd">
	<tr>
		<td class="TDleft"><label>在谈项目名称：</label></td>
		<td colspan="3">
		<input type="text" name="zt_project_name" value="<?php echo ($mo["zt_project_name"]); ?>" class="input-xlarge"  title="在谈项目名称">
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>在谈建设内容：</label></td>
		<td>
		<input type="text" name="zt_build_content" value="<?php echo ($mo["zt_build_content"]); ?>" class="input-xlarge"  title="在谈建设内容">
		</td>
		<td class="TDleft"><label>拟投资额：</label></td>
		<td><!-- <input type="text" id="plan_invest" name="plan_invest" value="<?php echo ($mo["plan_invest"]); ?>" class="input-xlarge"> --><!-- (亿元）  -->
		<select id="zt_plan_invest" name="zt_plan_invest"  title="拟投资额">
			<option value="" <?php if(($mo["zt_plan_invest"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "拟投资额"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["zt_plan_invest"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
			<!-- <option value="" <?php if(($mo["zt_plan_invest"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			<option value="0-5000万" <?php if(($mo["zt_plan_invest"]) == "0-5000万"): ?>selected<?php endif; ?>>0-5000万</option>
			<option value="5000万-1亿" <?php if(($mo["zt_plan_invest"]) == "5000万-1亿"): ?>selected<?php endif; ?>>5000万-1亿</option>
			<option value="1亿-5亿" <?php if(($mo["zt_plan_invest"]) == "1亿-5亿"): ?>selected<?php endif; ?>>1亿-5亿</option>
			<option value="5亿以上" <?php if(($mo["zt_plan_invest"]) == "5亿以上"): ?>selected<?php endif; ?>>5亿以上</option> -->
		</select></td>
	</tr>
	<tr>
		<td class="TDleft"><label>在谈投资方：</label></td>
		<td>
		<input type="text" name="zt_investor" value="<?php echo ($mo["zt_investor"]); ?>" class="input-xlarge"  title="在谈投资方">
		</td>
		<td class="TDleft"><label>行业：</label></td>
		<td>
			<!-- <input type="text" name="zt_trade" value="<?php echo ($mo["zt_trade"]); ?>" class="input-xlarge"> -->
		<select id="zt_trade" name="zt_trade"  title="行业">
			   <option value="" <?php if(($mo["zt_trade"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "行业"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["zt_trade"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
			<!-- <option value="" <?php if(($mo["zt_trade"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			<option value="工业" <?php if(($mo["zt_trade"]) == "工业"): ?>selected<?php endif; ?>>工业</option>
			<option value="农业" <?php if(($mo["zt_trade"]) == "农业"): ?>selected<?php endif; ?>>农业</option>
			<option value="服务业" <?php if(($mo["zt_trade"]) == "服务业"): ?>selected<?php endif; ?>>服务业</option> -->
		</select>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>拟建地点：</label></td>
		<td>
		<?php if(!in_array(($_SESSION['user']['dept']), explode(',',"大冶市,阳新县,开发区,下陆区,铁山区,黄石港区,西塞山区"))): ?><select id="zt_plan_place" name="zt_plan_place" >
			<option value="" <?php if(($mo["zt_plan_place"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "拟建地点"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["zt_plan_place"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select><?php endif; ?>
		<?php if(in_array(($_SESSION['user']['dept']), explode(',',"大冶市,阳新县,开发区,下陆区,铁山区,黄石港区,西塞山区"))): ?><input type="text" id="zt_plan_place" name="zt_plan_place" value="<?php echo ((isset($mo["zt_plan_place"]) && ($mo["zt_plan_place"] !== ""))?($mo["zt_plan_place"]):$_SESSION['user']['dept']); ?>"  /><?php endif; ?>
		
		</td>
		<td class="TDleft"><label>用地情况[亩]：</label></td>
		<td>
		<input type="number" name="zt_use_land" value="<?php echo ($mo["zt_use_land"]); ?>" class="input-xlarge" >
		</td>
	</tr>
	<tr>
		<!-- <td class="TDleft"><label>进展状态：</label></td>
		<td>
		<input type="text" name="zt_status" value="<?php echo ($mo["zt_status"]); ?>" class="input-xlarge">
		</td> -->
		<td class="TDleft"><label>联系人：</label></td>
		<td colspan="3">
		<input type="text" name="zt_link_man" value="<?php echo ($mo["zt_link_man"]); ?>" class="input-xlarge" >
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>联系人职务：</label></td>
		<td>
		<input type="text" name="zt_link_man_position" value="<?php echo ($mo["zt_link_man_position"]); ?>" class="input-xlarge" >
		</td>
		<td class="TDleft"><label>联系人电话：</label></td>
		<td>
		<input type="text" name="zt_link_man_tel" value="<?php echo ($mo["zt_link_man_tel"]); ?>" class="input-xlarge" >
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>跟踪人：</label></td>
		<td>
		<input type="text" name="zt_track_man" value="<?php echo ($mo["zt_track_man"]); ?>" class="input-xlarge" >
		</td>
		<td class="TDleft"><label>跟踪单位：</label></td>
		<td>
		<input type="text" name="zt_track_dept" value="<?php echo ($mo["zt_track_dept"]); ?>" class="input-xlarge" >
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