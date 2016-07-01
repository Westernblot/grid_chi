<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<script type="text/javascript" src="/grid_chi/Public/js/jquery.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>

	<script type="text/javascript">
	    function doQuery(){
			$('#form1').submit();
		}
		//撤销审核
		function resetAudit(field,fieldValue){
				var ids = getId('delete');
				if (ids == false) {
					return;
				}
				//alert(ids);
				if (confirm("确定操作吗？")) {
					location.href = "/grid_chi/index.php/Admin/Project/cmdAudit?ids=" + ids+"&field="+field+"&fieldValue="+fieldValue;
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
				<li class="active">
					投产项目一览表
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<a class="btn btn-danger pull-right" onclick="resetAudit('tc_flag','审核中')">
							撤销审核
						</a> 
						<form class="form-inline"  id="form1" action="/grid_chi/index.php/Admin/Project/auditTcProjectMain" method="get">				
						审核状态:<select id="flag" name="flag">
							<option value="" <?php if(($flag) == ""): ?>selected<?php endif; ?>>-查询全部-</option>
							<option value="审核中" <?php if(($flag) == "审核中"): ?>selected<?php endif; ?>>审核中</option>
							<option value="审核通过" <?php if(($flag) == "审核通过"): ?>selected<?php endif; ?>>审核通过</option>
							<option value="暂未通过" <?php if(($flag) == "暂未通过"): ?>selected<?php endif; ?>>暂未通过</option>
							<option value="审核未通过" <?php if(($flag) == "审核未通过"): ?>selected<?php endif; ?>>审核未通过</option>
						</select>
						<select id="add_dept" name="add_dept">
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
							<!-- <?php if(is_array($_SESSION['deptList'])): foreach($_SESSION['deptList'] as $key=>$vo): ?><option value="<?php echo ($vo["dept"]); ?>" <?php if(($add_dept) == $vo["dept"]): ?>selected<?php endif; ?> ><?php echo ($vo["dept"]); ?></option><?php endforeach; endif; ?> -->
						</select>
						时间：
						<input type="text" id="s_date" name="s_date" value="<?php echo ($s_date); ?>" class="Wdate"  onclick="WdatePicker()" />
						至
						<input type="text" id="e_date" name="e_date" value="<?php echo ($e_date); ?>" class="Wdate"  onclick="WdatePicker()" />
						
						<button class="btn" onclick="doQuery()">查询</button>
						</form>
						
					</div>
					<div class="block-tab">
    <table class="table-mins table-nowrap">
							<thead>
								<tr>
									<th>
									<input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)">
									</th>
									<th>编号</th>
									<th>填报单位</th>
									<th>投资方名称</th>
									<th>在黄注册名称</th>
									<th>法人代表</th>
									<th>注册时间</th>
									<th>注册资本[万元]</th>
									<th>总投资额[亿元]</th>
									<!-- <th>累计实际到资额[亿元]</th> -->
									<th>项目建设内容</th>
									<th>产业类别</th>
									<th>投产时间</th>
									<!-- <th>建设地点[注明园区]</th>
									<th>项目用地[亩]</th>
									<th>月度销售收入[亿元]</th>
									<th>备注</th>

									<th>审核状态</th>
									<th colspan="2">操作</th> -->
								</tr>
							</thead>
							<tbody>
								
						<?php if(empty($list)): ?><tr>
							<td colspan="20" align="center"><font color="red">查无数据</font></td>
						</tr><?php endif; ?>

								<?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>" <?php if(($k%2) == "0"): ?>class="odd"
										<?php else: ?>
										class="even"<?php endif; ?>>
										 <td>
										<input type="checkbox" name="chk" id="chk">
										</td>
										<td><?php echo ($np+$k+1); ?></td>
										<td>
											<?php echo ($vo["add_dept"]); ?>
										 
										</td>
										<td><?php echo (subtext($vo["qy_outside_investor"],12)); ?></td>
										<td>
											 <a href="/grid_chi/index.php/Admin/Project/auditTcProjectUI?id=<?php echo ($vo["id"]); ?>&flag=<?php echo ($flag); ?>&add_dept=<?php echo ($add_dept); ?>&s_date=<?php echo ($s_date); ?>&e_date=<?php echo ($e_date); ?>"><?php if(($vo["qy_total_invest"]) >= "5"): ?><img src="/grid_chi/Public/images/icon/flag.png"/><?php endif; ?>
											<?php echo (subtext($vo["zc_hs_name"],16)); ?></a>
										</td>
										<td><?php echo ($vo["zc_legal_person"]); ?></td>
										<td><?php echo ($vo["zc_date"]); ?></td>
										<td><?php echo ($vo["zc_capital"]); ?></td>
										<td><?php echo ($vo["qy_total_invest"]); ?></td>
										<!-- <td><?php echo ($vo["tc_accumulative_in_invest"]); ?></td> -->
										<td><?php echo (subtext($vo["qy_build_content"],20)); ?></td>
										<td><?php echo ($vo["qy_industry_category"]); ?></td>
										<td><?php echo ($vo["tc_date"]); ?></td>
										
										<!-- <td><?php echo ($vo["zc_build_place"]); ?></td>
										<td><?php echo ($vo["zc_user_land"]); ?></td>
										<td><?php echo ($vo["tc_month_sale_money"]); ?></td>
										<td><?php echo ($vo["tc_remark"]); ?></td>

										<td><font color="red"><?php echo ($vo['tc_status']!='已投产'?'error':''); echo ($vo["tc_flag"]); ?></font></td>
										<td>
											<a href="/grid_chi/index.php/Admin/Project/seeProjectUI?id=<?php echo ($vo["id"]); ?>&showNum=5">查看</a></td>
										<td>
											<a href="/grid_chi/index.php/Admin/Project/tcProjectUI?id=<?php echo ($vo["id"]); ?>">编辑</a>
											<a href="/grid_chi/index.php/Admin/Project/tcProjectUI?id=<?php echo ($vo["id"]); ?>&toPage=tcProjectMain">变更投产项目</a> 
										    <?php if(($vo["tc_flag"]) == "审核中"): ?><a href="/grid_chi/index.php/Admin/Project/auditTcProjectUI?id=<?php echo ($vo["id"]); ?>">审核</a><?php endif; ?>
										</td> -->
									</tr><?php endforeach; endif; ?>

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