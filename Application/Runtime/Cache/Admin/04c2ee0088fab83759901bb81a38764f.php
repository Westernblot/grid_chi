<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<script type="text/javascript" src="/grid_chi/Public/js/jquery.js"></script>
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

	//查询
	   function doQuery(){
	   	   $('#form1').attr('action','/grid_chi/index.php/Admin/Project/new_work_progress');
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
					招商引资工作汇总表
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">						
						<form class="form-inline" id="form1" action="" method="post">		
						时间：
						<input type="text" id="s_date" name="s_date" value="<?php echo ($s_date); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" size="10" />
						至
						<input type="text" id="e_date" name="e_date" value="<?php echo ($e_date); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" size="10" />
						总投资额大于等于[亿]:<input type="number" name="qy_total_invest" value="<?php echo ($qy_total_invest); ?>" size="3">
						审核状态：<select name="flag" >
							<option value="" <?php if(($flag) == ""): ?>selected<?php endif; ?>>-查询所有-</option>
							<option value="审核通过" <?php if(($flag) == "审核通过"): ?>selected<?php endif; ?>>审核通过</option>
							<option value="审核未通过" <?php if(($flag) == "审核未通过"): ?>selected<?php endif; ?>>审核未通过</option>
							<option value="审核中" <?php if(($flag) == "审核中"): ?>selected<?php endif; ?>>审核中</option>
							<option value="已保存" <?php if(($flag) == "已保存"): ?>selected<?php endif; ?>>已保存</option>
						</select>
						<a class="btn" onclick="doQuery()">查询</a>
						<!-- <a class="btn" onclick="doExcel()">导出到excel</a> -->
						
						</form>
					</div>
<div class="block-tab">
    <table class="table-mins">
							<thead>
								<tr>
									<th rowspan="2">单位</th>								
									<th colspan="5">新注册重点项目</th>																
									<th rowspan="2">新开工重点项目数[个数]</th>
									<th rowspan="2">新投产重点项目数[个数]</th>
								</tr>
								<tr>									
									<th>项目数</th>
									<th>其中：重大项目数</th>
									<th>合同投资总额[亿元]</th>
									<th>一期投资额[亿元]</th>
									<th>注册资本额[万元]</th>																		
								</tr>
							</thead>
							<tbody>
								
								<tr class="odd">
									<td>开发区</td>
									<td><?php echo ($kfq["res1"]); ?></td>
									<td><?php echo ($kfq["res2"]); ?></td>
									<td><?php echo ($kfq["res3"]); ?></td>
									<td><?php echo ($kfq["res4"]); ?></td>
									<td><?php echo ($kfq["res5"]); ?></td>
									<td><?php echo ($kfq["res6"]); ?></td>
									<td><?php echo ($kfq["res7"]); ?></td>
								</tr>
								<tr class="even">
									<td>大冶市</td>
									<td><?php echo ($dy["res1"]); ?></td>
									<td><?php echo ($dy["res2"]); ?></td>
									<td><?php echo ($dy["res3"]); ?></td>
									<td><?php echo ($dy["res4"]); ?></td>
									<td><?php echo ($dy["res5"]); ?></td>
									<td><?php echo ($dy["res6"]); ?></td>
									<td><?php echo ($dy["res7"]); ?></td>
								</tr>
								<tr class="odd">
									<td>阳新县</td>
									<td><?php echo ($yx["res1"]); ?></td>
									<td><?php echo ($yx["res2"]); ?></td>
									<td><?php echo ($yx["res3"]); ?></td>
									<td><?php echo ($yx["res4"]); ?></td>
									<td><?php echo ($yx["res5"]); ?></td>
									<td><?php echo ($yx["res6"]); ?></td>
									<td><?php echo ($yx["res7"]); ?></td>
								</tr>
								<tr class="even">
									<td>黄石港区</td>
									<td><?php echo ($hsg["res1"]); ?></td>
									<td><?php echo ($hsg["res2"]); ?></td>
									<td><?php echo ($hsg["res3"]); ?></td>
									<td><?php echo ($hsg["res4"]); ?></td>
									<td><?php echo ($hsg["res5"]); ?></td>
									<td><?php echo ($hsg["res6"]); ?></td>
									<td><?php echo ($hsg["res7"]); ?></td>
								</tr>
								<tr class="odd">
									<td>西塞山区</td>
									<td><?php echo ($xss["res1"]); ?></td>
									<td><?php echo ($xss["res2"]); ?></td>
									<td><?php echo ($xss["res3"]); ?></td>
									<td><?php echo ($xss["res4"]); ?></td>
									<td><?php echo ($xss["res5"]); ?></td>
									<td><?php echo ($xss["res6"]); ?></td>
									<td><?php echo ($xss["res7"]); ?></td>
								</tr>
								<tr class="even">
									<td>下陆区</td>
									<td><?php echo ($xl["res1"]); ?></td>
									<td><?php echo ($xl["res2"]); ?></td>
									<td><?php echo ($xl["res3"]); ?></td>
									<td><?php echo ($xl["res4"]); ?></td>
									<td><?php echo ($xl["res5"]); ?></td>
									<td><?php echo ($xl["res6"]); ?></td>
									<td><?php echo ($xl["res7"]); ?></td>
								</tr>
								<tr class="odd">
									<td>铁山区</td>
									<td><?php echo ($ts["res1"]); ?></td>
									<td><?php echo ($ts["res2"]); ?></td>
									<td><?php echo ($ts["res3"]); ?></td>
									<td><?php echo ($ts["res4"]); ?></td>
									<td><?php echo ($ts["res5"]); ?></td>
									<td><?php echo ($ts["res6"]); ?></td>
									<td><?php echo ($ts["res7"]); ?></td>
								</tr>
								<tr class="even">
									<td><font color="red"><b>合计</b></font></td>									
									<td>
										<font color="red"><b>
										<?php echo ($kfq['res1']+$dy['res1']+$yx['res1']+$hsg['res1']+$xss['res1']+$xl['res1']+$ts['res1']); ?>
										</b></font>
									</td>
									<td>
										<font color="red"><b>
										<?php echo ($kfq['res2']+$dy['res2']+$yx['res2']+$hsg['res2']+$xss['res2']+$xl['res2']+$ts['res2']); ?>
										</b></font>
									</td>
									<td>
										<font color="red"><b>
										<?php echo ($kfq['res3']+$dy['res3']+$yx['res3']+$hsg['res3']+$xss['res3']+$xl['res3']+$ts['res3']); ?>
										</b></font>
									</td>
									<td>
										<font color="red"><b>
										<?php echo ($kfq['res4']+$dy['res4']+$yx['res4']+$hsg['res4']+$xss['res4']+$xl['res4']+$ts['res4']); ?>
										</b></font>
									</td>
									<td>
										<font color="red"><b>
										<?php echo ($kfq['res5']+$dy['res5']+$yx['res5']+$hsg['res5']+$xss['res5']+$xl['res5']+$ts['res5']); ?>
										</b></font>
									</td>
									<td>
										<font color="red"><b>
										<?php echo ($kfq['res6']+$dy['res6']+$yx['res6']+$hsg['res6']+$xss['res6']+$xl['res6']+$ts['res6']); ?>
										</b></font>
									</td>
									<td>
										<font color="red"><b>
										<?php echo ($kfq['res7']+$dy['res7']+$yx['res7']+$hsg['res7']+$xss['res7']+$xl['res7']+$ts['res7']); ?>
										</b></font>
									</td>								
								</tr>

							</tbody>
						</table>
					</div>

											<div class="block-foot">
											        <div class="pagination">
											            <?php echo ($page); ?>
											        </div>
											</div>

				</div>
			</div>
		</div>
	</body>
	
</html>