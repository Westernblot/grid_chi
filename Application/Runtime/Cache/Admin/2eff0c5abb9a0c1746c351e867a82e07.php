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
	<script src="/grid_chi/Public/validate/jquery.js"></script>
    <script src="/grid_chi/Public/validate/jquery.validate.min.js"></script>
    <script src="/grid_chi/Public/validate/localization/messages_zh.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
		<script type="text/javascript">
	   $().ready(function() {
         $("#form1").validate();
       });
			
			//提交审核
			function submitAudit() {
					// var checked = checkForm('#form1');
					// if (checked == false) {
						// return;
					// }
				
				//========================投资额超过100亿元提醒=====================
				var qy_total_invest= $("input[name='qy_total_invest']").val();
				var qy_first_invest= $("input[name='qy_first_invest']").val();
				
				if(qy_total_invest>100 || qy_first_invest>100){
					if(confirm("提示：投资额超过了100亿元！确定吗?")){
						$('#qy_flag').attr('value','已保存');
				        $('#form1').submit();
					}
					return;
				}
				//===========================================================
				
				$('#qy_flag').attr('value','审核中');
				$('#form1').submit();
			}

			function saveForm() {
					// var checked = checkForm('#form1');
					// if (checked == false) {
						// return;
					// }
				
				//========================投资额超过100亿元提醒=====================
				var qy_total_invest= $("input[name='qy_total_invest']").val();
				var qy_first_invest= $("input[name='qy_first_invest']").val();
				
				if(qy_total_invest>100 || qy_first_invest>100){
					if(confirm("提示：投资额超过了100亿元！确定吗?")){
						$('#qy_flag').attr('value','已保存');
				        $('#form1').submit();
					}
					return;
				}
				//===========================================================
				
				$('#qy_flag').attr('value','已保存');
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
						<!-- <a href="javascript:submitAudit()" class="btn">提交审核</a> -->
						<a href="javascript:history.back();" class="btn">返回</a>
							<!-- <a href="javascript:" class="btn btn-danger pull-right"> 项目库选择</a> -->
						<div class="btn-group">
						</div>
					</div>
					<div class="well you-bg">
						<form id="form1" action="<?php echo ($mo==null?'/grid_chi/index.php/Admin/Project/insert':'/grid_chi/index.php/Admin/Project/update'); ?>?toPage=<?php echo ($toPage); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>" />
							<input type="hidden" name="qy_status" value="已签约" />
							<input type="hidden" id="qy_flag" name="qy_flag" value="" />  <!-- 提交签约审核状态 -->

							
							<font color="red"><h3>签约信息</h3></font>
							<hr>
							<!-- 签约项目模板 -->
							<table class="youAdd">
	
	<tr>
		<td class="TDleft"><label>项目名称：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="qy_project_name" value="<?php echo ($mo["qy_project_name"]); ?>" class="input-xlarge" required="true">
		</td>
		<td class="TDleft"><label>建设内容：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="qy_build_content" value="<?php echo ($mo["qy_build_content"]); ?>" class="input-xlarge" required="true">
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>本地投资方：</label></td>
		<td>
		<input type="text" name="qy_local_investor" value="<?php echo ($mo["qy_local_investor"]); ?>" class="input-xlarge" >
		</td>
		<td class="TDleft"><label>外来投资方：</label></td>
		<td>
		<input type="text" name="qy_outside_investor" value="<?php echo ($mo["qy_outside_investor"]); ?>" class="input-xlarge" >
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>总投资额[亿元]：<font color="red">*</font></label></td>
		<td>
		<input type="number" name="qy_total_invest" value="<?php echo ($mo["qy_total_invest"]); ?>" class="input-xlarge" required>
		</td>
		<td class="TDleft"><label>一期投资额[亿元]：<font color="red">*</font></label></td>
		<td>
		<input type="number" name="qy_first_invest" value="<?php echo ($mo["qy_first_invest"]); ?>" class="input-xlarge" required>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>行业类别：<font color="red">*</font></label></td>
		<td >
	    <!-- <input type="text" name="qy_trade_type" value="<?php echo ($mo["qy_trade_type"]); ?>" class="input-xlarge"> -->
		<select id="qy_trade_type" name="qy_trade_type" required>
			   <option value="" <?php if(($mo["qy_trade_type"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "行业"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["qy_trade_type"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		</td>
		<td class="TDleft"><label>产业类别：<font color="red">*</font></label></td>
		<td>
		<!-- <input type="text" name="qy_industry_category" value="<?php echo ($mo["qy_industry_category"]); ?>" class="input-xlarge"> -->
		<select id="qy_industry_category" name="qy_industry_category" required>
			<option value="" <?php if(($mo["qy_industry_category"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "产业类别"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["qy_industry_category"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		</td>
	</tr>
	<tr>
	    <td class="TDleft"><label>签约时间：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="qy_date" value="<?php echo ($mo["qy_date"]); ?>"  class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" required>
		</td>
		<td class="TDleft"><label>签约备注：</label></td>
		<td >
		<!-- <input type="text" name="qy_remark" value="<?php echo ($mo["qy_remark"]); ?>" class="input-xlarge"> -->
		<textarea name="qy_remark" rows="3" cols="100"><?php echo ($mo["qy_remark"]); ?></textarea>
		</td>
	</tr>
</table>

							<!-- <h3>审核信息</h3>
							<font color="blue" size="4"><?php echo ($mo["qy_opinion"]); ?></font> -->
							
							<!-- <fieldset>
							<legend>
							<small>填报说明：</small>
							</legend>
							<p class="table-notes">
							1、新签合同项目只统计总投资额在1亿元以上的产业项目。
							<br/>
							2、产业类别：农业/工业/服务业。
							<br/>
							3、注册时间和签约时间填写6位编码，例如：201401。
							<br/>
							4、如为世界500强、 国内500强、上市公司的投资项目请在备注栏内注明。
							</p>
							</fieldset> -->

						</form>
					</div>

				</div>
			</div>
		</div>
	</body>

</html>