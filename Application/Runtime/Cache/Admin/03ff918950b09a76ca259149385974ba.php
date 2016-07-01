<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/js/combo/dhtmlxcombo.css"/>
        <script type="text/javascript" src="/grid_chi/Public/js/jquery.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
	</head>

	<body>
		<div class="content">
			<ul class="breadcrumb">
				<li>
					<a href="/grid_chi/index.php/Admin/Index/main.html">首页</a><span class="divider">/</span>
				</li>
				<li class="active">
					信息查询
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="well you-bg">
						<form id="form1" action="/grid_chi/index.php/Admin/Project/selectProjectMain" method="post">

							<table class="youAdd">
								<tr>
									<td class="TDleft"><label>项目状态：</label></td>
									<td>									
									<select name="status_key">
										<option value="">-查询所有-</option>
										<option value="在谈">在谈</option>
										<option value="已签约">已签约</option>
										<option value="已注册">已注册</option>
										<option value="已开工">已开工</option>
										<option value="已投产">已投产</option>
									</select>						
									</td>
									<td class="TDleft"><label>审核状态：</label></td>
									<td>
									<select name="flag_key">
										<option value="">-查询所有-</option>
										<option value="审核通过">审核通过</option>
										<option value="审核未通过">审核未通过</option>
										<option value="审核中">审核中</option>
									</select>
									</td>	
								</tr>
								<tr>
									<td class="TDleft"><label>项目名称：</label></td>
									<td>									
									 <input type="text" name="qy_project_name" value="<?php echo ($qy_project_name); ?>" />					
									</td>
									
								</tr>
		<tr>
			                        <td class="TDleft"><label>总投资额[亿元]：</label></td>
									<td colspan="3">
									<input type="text" name="s_qy_total_invest" value="" />
								          	至
									<input type="text" name="e_qy_total_invest" value="" />									
									</td>	
		</tr>
    <tr>
		<td class="TDleft"><label>行业类别：</label></td>
		<td >    
		<select id="qy_trade_type" name="qy_trade_type" >
			   <option value="" <?php if(($qy_trade_type) == ""): ?>selected<?php endif; ?>>-查询所有-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "行业"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($qy_trade_type) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		</td>
		<td class="TDleft"><label>产业类别：</label></td>
		<td>
		<select id="qy_industry_category" name="qy_industry_category" >
			<option value="" <?php if(($qy_industry_category) == ""): ?>selected<?php endif; ?>>-查询所有-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "产业类别"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($qy_industry_category) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		</td>
	</tr>
	  <tr>
			                        <td class="TDleft"><label>签约时间：</label></td>
									<td colspan="3">
									<input type="text" name="qy_date" value="" />									
									</td>	
		</tr>
	<tr>
		<td class="TDleft"><label>工商注册号：</label></td>
		<td>
		<input type="text" name="zc_register_no" value="<?php echo ($mo["zc_register_no"]); ?>" class="input-xlarge" >
		</td>
		<td class="TDleft"><label>在黄注册名称：</label></td>
		<td>
		<input type="text" name="zc_hs_name" value="<?php echo ($mo["zc_hs_name"]); ?>" class="input-xlarge" >
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>注册资本[万元]：</label></td>
		<td colspan="3">
		<input type="text" name="s_zc_capital" value="<?php echo ($mo["zc_capital"]); ?>" class="input-xlarge" >
		至
		<input type="text" name="e_zc_capital" value="<?php echo ($mo["zc_capital"]); ?>" class="input-xlarge" >
		
		</td>
   </tr>
   <tr>
		<td class="TDleft"><label>法人代表：</label></td>
		<td colspan="3">
		<input type="text" name="zc_legal_person" value="<?php echo ($mo["zc_legal_person"]); ?>" class="input-xlarge" >
		</td>
	</tr>	
	<tr>
		<td class="TDleft"><label>注册时间：</label></td>
		<td>
		<input type="text" name="zc_date" value="<?php echo ($mo["zc_date"]); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" >
		</td>
		<td class="TDleft"><label>所属产业链：</label></td>
		<td>
		<select id="zc_industry_chain" name="zc_industry_chain" >
			   <option value="" <?php if(($zc_industry_chain) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "所属产业链"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($zc_industry_chain) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		</td>
	</tr>	
	<tr>
		<td class="TDleft"><label>开工时间：</label></td>
		<td>
		<input type="text" name="kg_date" value="<?php echo ($mo["kg_date"]); ?>" class="Wdate"  onclick="WdatePicker()" >
		</td>
		<td class="TDleft"><label>投产时间：</label></td>
		<td>
		<input type="text" name="tc_date" value="<?php echo ($mo["tc_date"]); ?>" class="Wdate"  onclick="WdatePicker()" >
		</td>
	</tr>
	
		
                               <tr>
                               	<td colspan="4" align="center">   
                               		<br>                        		
							<input type="submit" value="查询" class="btn btn-primary" />
                               		<br> 
                               		&nbsp;                      		
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