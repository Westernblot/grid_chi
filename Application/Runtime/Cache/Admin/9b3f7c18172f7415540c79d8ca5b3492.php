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

	<script type="text/javascript">
	     //提交审核、撤销提交
			function updateAudit(field,fieldValue){
				var ids = getId('delete');
				if (ids == false) {
					return;
				}
				//alert(ids);
				if (confirm("确定操作吗？")) {
					location.href = "/grid_chi/index.php/Admin/Project/cmdAudit?ids=" + ids+"&field="+field+"&fieldValue="+fieldValue;
				}
			}
	    function doQuery(){
	   	    var zc_hs_name  = $('#zc_hs_name').val();
	   	 	location.href = '/grid_chi/index.php/Admin/Project/tcProjectMain?zc_hs_name=' + zc_hs_name;
	   } 
		//删除
		function doDelete() {
			var ids = getId('delete');
			if (ids == false) {
				return;
			}
			//alert(ids);
			if (confirm("确定删除吗？")) {
				location.href = '/grid_chi/index.php/Admin/Project/delete?ids=' + ids;
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
						<!-- <button class="btn btn-danger pull-right" onclick="doDelete()">
							<img src="/grid_chi/Public/images/icon/cross.png"/> 删除
						</button> -->
						<form class="form-inline">
						<p>
							<a href="/grid_chi/index.php/Admin/Project/tcProjectUI" class="btn btn-primary"><img src="/grid_chi/Public/images/icon/plus.png"/> 添加项目</a>　　
							 <a href="javascript:updateAudit('tc_flag','审核中')" class="btn btn-info"> 提交审核</a>
							<a href="javascript:updateAudit('tc_flag','已保存')" class="btn"> 撤销提交</a>
						</p>
						在黄注册名称：<input type="text" id="zc_hs_name" name="zc_hs_name" value="<?php echo ($zc_hs_name); ?>" />
						审核状态：<select name="tc_flag">
							<option value="" <?php if(($tc_flag) == ""): ?>selected<?php endif; ?>>-查询所有-</option>
							<option value="审核通过" <?php if(($tc_flag) == "审核通过"): ?>selected<?php endif; ?>>审核通过</option>
							<option value="审核未通过" <?php if(($tc_flag) == "审核未通过"): ?>selected<?php endif; ?>>审核未通过</option>
							<option value="审核中" <?php if(($tc_flag) == "审核中"): ?>selected<?php endif; ?>>审核中</option>
							<option value="已保存" <?php if(($tc_flag) == "已保存"): ?>selected<?php endif; ?>>已保存</option>
						</select>
						<button class="btn" onclick="doQuery()">查询</button></form>
					</div>
<div class="block-tab">
    <table class="table-mins">
							<thead>
								<tr>
									<th>
									<input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)">
									</th>
									<!-- <th>编号</th> -->
									<th>投资方名称</th>
									<th>在黄注册名称</th>
									<th>法人代表</th>
									<th>注册时间</th>
									<th>注册资本[万元]</th>
									<th>总投资额[亿元]</th>
									<th>累计实际到资额[亿元]</th>
									<th>项目建设内容</th>
									<th>产业类别</th>
									<th>投产时间</th>
									<th>建设地点[注明园区]</th>
									<th>项目用地[亩]</th>
									<th>月度销售收入[亿元]</th>
									<th>备注</th>
									<!-- <th>状态</th> -->
									<th>审核状态</th>
									<th colspan="2">操作</th>
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
											<?php if(($vo["tc_flag"]) != "审核通过"): ?><input type="checkbox" name="chk" id="chk"><?php endif; ?>
										</td>
										<!-- <td><?php echo ($vo["id"]); ?></td> -->
										<td><?php echo ($vo["qy_outside_investor"]); ?></td>
										<td><?php echo ($vo["zc_hs_name"]); ?></td>
										<td><?php echo ($vo["zc_legal_person"]); ?></td>
										<td><?php echo ($vo["zc_date"]); ?></td>
										<td><?php echo ($vo["zc_capital"]); ?></td>
										<td><?php echo ($vo["qy_total_invest"]); ?></td>
										<td><?php echo ($vo["tc_accumulative_in_invest"]); ?></td>
										<td><?php echo ($vo["qy_build_content"]); ?></td>
										<td><?php echo ($vo["qy_industry_category"]); ?></td>
										<td><?php echo ($vo["tc_date"]); ?></td>
										<td><?php echo ($vo["zc_build_place"]); ?></td>
										<td><?php echo ($vo["zc_user_land"]); ?></td>
										<td><?php echo ($vo["tc_month_sale_money"]); ?></td>
										<td><?php echo ($vo["tc_remark"]); ?></td>
										<!-- <td><font color="red"><?php echo ($vo["tc_status"]); ?></font></td> -->
										<td><font color="red"><?php echo ($vo["tc_flag"]); echo ($vo['tc_status']!='已投产'?'error':''); ?></font></td>
										<td>
											<a href="/grid_chi/index.php/Admin/Project/seeProjectUI?id=<?php echo ($vo["id"]); ?>&showNum=5">查看</a>
										</td>
										<td>
										    <?php if(($vo["tc_flag"]) != "审核通过"): ?><a href="/grid_chi/index.php/Admin/Project/tcProjectUI?id=<?php echo ($vo["id"]); ?>">编辑</a><?php endif; ?>
										</td>
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