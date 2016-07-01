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
	<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
	<script type="text/javascript">
	   //给审核意见
	   function giveOpinion(obj){
	   	 var val = $(obj).val();
	   	 $('#opinion').text(val);
	   }
	
	   //审核
		function auditFlag(flag) {
			var checked = checkForm('#form1');
			if (checked == false) {
				return;
			}
			if (confirm("确定删除吗？")) {
			   $('#fieldValue_flag').attr('value',flag);
			   $('#form1').submit();
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
					<a href="/grid_chi/index.php/Admin/Project/ztProjectMain">在谈项目一览表</a><span class="divider">/</span>
				</li>
				<li class="active">
					添加项目
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">
					
					<div class="well you-bg">
						<form id="form1" action="/grid_chi/index.php/Admin/Project/cmdProjectAudit?toPage=<?php echo ($toPage); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>" />
							<input type="hidden" id="fieldValue_flag" name="fieldValue_flag" value="" />            <!-- 审核值:动态赋予 -->
							<input type="hidden" name="field_flag" value="qy_flag" />          <!-- 审核字段 -->
							<input type="hidden" name="field_opinion" value="qy_opinion" />    <!-- 审核意见字段 -->
							<!-- $field_flag = '', $fieldValue_flag = '',$field_opinion='', $opinion = '' -->
                            
                            <font color="red"><h3>在谈信息</h3></font>
                            <hr>
							<!-- 在谈项目模板 -->
							<table class="youAdd">
	<tr>
		<td class="TDleft"><label>在谈项目名称：</label></td>
		<td>
		<?php echo ($mo["zt_project_name"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>在谈建设内容：</label></td>
		<td>
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
		<td>
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
							
							<font color="red"><h3>签约信息</h3></font>
							<hr>
							<!-- 签约项目模板 -->
							<table class="youAdd">
	<tr>
		<td class="TDleft"><label>本地投资方：</label></td>
		<td>
		<?php echo ($mo["qy_local_investor"]); ?>
		</td>
	
		<td class="TDleft"><label>一期投资额（亿元）：</label></td>
		<td>
		<?php echo ($mo["qy_first_invest"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>外来投资方：</label></td>
		<td>
		<?php echo ($mo["qy_outside_investor"]); ?>
		</td>
	
		<td class="TDleft"><label>项目名称：</label></td>
		<td>
		<?php echo ($mo["qy_project_name"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>建设内容：</label></td>
		<td>
		<?php echo ($mo["qy_build_content"]); ?>
		</td>
	
		<td class="TDleft"><label>签约时间：</label></td>
		<td>
		<?php echo ($mo["qy_date"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>总投资额[亿元]：</label></td>
		<td>
		<?php echo ($mo["qy_total_invest"]); ?>
		</td>
		<td class="TDleft"><label>产业类别：</label></td>
		<td>
		<?php echo ($mo["qy_industry_category"]); ?>
		
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>行业类别：</label></td>
		<td >
	    <?php echo ($mo["qy_trade_type"]); ?>
		
		</td>
		<td class="TDleft"><label>签约备注：</label></td>
		<td >
		<?php echo ($mo["qy_remark"]); ?>
		</td>
	</tr>
</table>



                            <h3>审核记录</h3>
                            <font color="blue"><?php echo ($mo["qy_opinion"]); ?></font>
                            <h3>本次审核意见：</h3>
               <select id="sel_opinion" name="sel_opinion" onchange="giveOpinion(this)">
               <option value="" >-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "审核意见"): ?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
               </select><br>
							<textarea id="opinion" name="opinion"></textarea>
							
				   <div class="btn-toolbar">
						<!-- <button class="btn btn-primary" onclick="auditFlag('认可')">
							 认可
						</button>
						<button class="btn " onclick="auditFlag('不认可')">
							 不认可
						</button> -->
						<input type="button" class="btn btn-primary" value="认可" onclick="auditFlag('认可')" />
						<input type="button" class="btn" value="不认可" onclick="auditFlag('不认可')" />
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</body>
	
</html>