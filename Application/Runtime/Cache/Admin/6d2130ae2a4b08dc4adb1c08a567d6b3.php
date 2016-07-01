<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<script src="/grid_chi/Public/validate/jquery.js"></script>
    <script src="/grid_chi/Public/validate/jquery.validate.min.js"></script>
    <script src="/grid_chi/Public/validate/localization/messages_zh.js"></script>
    <script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
    <script type="text/javascript">
	     $().ready(function() {
                $("#form1").validate();
         });

	//导出到excel
	   function doExcel(){
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
				<li class="active">
					项目汇总
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">						
						<form class="form-inline" id="form1" action="/grid_chi/index.php/Admin/Outside/outsideExcel" method="get">								
						
							<table>
								
								<tr>
									<td>
										时间：
									</td>
									<td>
						<input type="text" id="s_date" name="s_date" value="<?php echo ($s_date); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" size="10" />
						至
						<input type="text" id="e_date" name="e_date" value="<?php echo ($e_date); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" size="10" />
									</td>
								</tr>
								
								<tr>
                                  <td>
                                                                                                             审核状态：
                                  </td>															
                                  <td>
						<select name="flag" >							
							<option value="审核通过" >审核通过</option>
							<option value="审核未通过" >审核未通过</option>
							<option value="审核中" >审核中</option>
							<option value="已保存" >已保存</option>
						</select>
                                  </td>
								</tr>
                               <tr>
                               	<td>所属县市区：</td>
                               	<td>                            		
					 <select id="add_dept" name="add_dept[]" multiple="multiple" size="20">
							<option value="" <?php if(($add_dept) == ""): ?>selected<?php endif; ?> >-查询所有-</option>
							<option value="开发区" <?php if(($add_dept) == "开发区"): ?>selected<?php endif; ?> >开发区</option>
							<option value="大冶市" <?php if(($add_dept) == "大冶市"): ?>selected<?php endif; ?> >大冶市</option>
							<option value="阳新县" <?php if(($add_dept) == "阳新县"): ?>selected<?php endif; ?> >阳新县</option>
							<option value="黄石港区" <?php if(($add_dept) == "黄石港区"): ?>selected<?php endif; ?> >黄石港区</option>
							<option value="西塞山区" <?php if(($add_dept) == "西塞山区"): ?>selected<?php endif; ?> >西塞山区</option>
							<option value="下陆区" <?php if(($add_dept) == "下陆区"): ?>selected<?php endif; ?> >下陆区</option>
							<option value="铁山区" <?php if(($add_dept) == "铁山区"): ?>selected<?php endif; ?> >铁山区</option>
							<option value="市经信委" <?php if(($add_dept) == "市经信委"): ?>selected<?php endif; ?> >市经信委</option>
							<option value="市国资委" <?php if(($add_dept) == "市国资委"): ?>selected<?php endif; ?> >市国资委</option>
							<option value="市科技局" <?php if(($add_dept) == "市科技局"): ?>selected<?php endif; ?> >市科技局</option>
							<option value="市财政局" <?php if(($add_dept) == "市财政局"): ?>selected<?php endif; ?> >市财政局</option>
							<option value="市商务委" <?php if(($add_dept) == "市商务委"): ?>selected<?php endif; ?> >市商务委</option>
							<option value="市委统战部" <?php if(($add_dept) == "市委统战部"): ?>selected<?php endif; ?> >市委统战部</option>
							<option value="市卫计委" <?php if(($add_dept) == "市卫计委"): ?>selected<?php endif; ?> >市卫计委</option>
							<option value="市食药监局" <?php if(($add_dept) == "市食药监局"): ?>selected<?php endif; ?> >市食药监局</option>
							<option value="市商务委" <?php if(($add_dept) == "市商务委"): ?>selected<?php endif; ?> >市商务委</option>
							<option value="市房产局" <?php if(($add_dept) == "市房产局"): ?>selected<?php endif; ?> >市房产局</option>
							<option value="市发改委" <?php if(($add_dept) == "市发改委"): ?>selected<?php endif; ?> >市发改委</option>
							<option value="市台办" <?php if(($add_dept) == "市台办"): ?>selected<?php endif; ?> >市台办</option>						
						</select>
                               	</td>
                               </tr>
                               <tr>
                               	<td></td>
                               	<td>                            		
						<!-- <a class="btn" onclick="doQuery()">查询</a> -->
						<a class="btn" onclick="doExcel()">导出到excel</a>
                               	</td>
                               </tr>
						
							</table>	
						</form>
					</div>



				</div>
			</div>
		</div>
</html>