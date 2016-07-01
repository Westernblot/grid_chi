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
			
			//查询
			function doQuery() {
				var qy_project_name = $('#qy_project_name').val();
				location.href = '/grid_chi/index.php/Admin/Project/qyProjectMain?qy_project_name=' + qy_project_name;
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
					签约项目一览表
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<button class="btn btn-danger pull-right" onclick="doDelete()">
							<img src="/grid_chi/Public/images/icon/cross.png"/> 删除
						</button>
						<form class="form-inline">
						<p>
							<a href="/grid_chi/index.php/Admin/Project/qyProjectUI" class="btn btn-primary"><img src="/grid_chi/Public/images/icon/plus.png"/> 添加项目</a>　　				
							<!-- <a href="javascript:updateAudit('qy_flag','审核中')" class="btn btn-info"> 提交审核</a>
							<a href="javascript:updateAudit('qy_flag','已保存')" class="btn"> 撤销提交</a>  -->
						</p>
						签约项目名称：
						<input type="text" id="qy_project_name" name="qy_project_name" value="<?php echo ($qy_project_name); ?>" />
						审核状态：<select name="qy_flag">
							<option value="" <?php if(($qy_flag) == ""): ?>selected<?php endif; ?>>-查询所有-</option>
							<option value="审核通过" <?php if(($qy_flag) == "审核通过"): ?>selected<?php endif; ?>>审核通过</option>
							<option value="审核未通过" <?php if(($qy_flag) == "审核未通过"): ?>selected<?php endif; ?>>审核未通过</option>
							<option value="审核中" <?php if(($qy_flag) == "审核中"): ?>selected<?php endif; ?>>审核中</option>
							<option value="已保存" <?php if(($qy_flag) == "已保存"): ?>selected<?php endif; ?>>已保存</option>
						</select>
						<button class="btn" onclick="doQuery()">
							查询
						</button>
						</form>
					</div>
<div class="block-tab">
    <table class="table-mins">
							<thead>
								<tr>
									<th>
									<input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)">
									</th>
									<!-- <th>编号</th> -->
									<th>外来投资方</th>
									<th>签约项目名称</th>
									<th>签约建设内容</th>
									<th>签约时间</th>
									<th>签约总投资额[亿元]</th>
									<th>产业类别</th>
									<!-- <th>状态</th> -->
									<!-- <th>审核状态</th> -->

									<th colspan="3">操作</th>

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
	<?php if(($vo["zc_status"]) != "已注册"): ?><input type="checkbox" name="chk" id="chk"><?php endif; ?>								
										</td>
										<!-- <td><?php echo ($vo["id"]); ?></td> -->
										<td><?php echo ($vo["qy_outside_investor"]); ?></td>
										<td><?php echo ($vo["qy_project_name"]); ?></td>
										<td><?php echo ($vo["qy_build_content"]); ?></td>
										<td><?php echo ($vo["qy_date"]); ?></td>
										<td><?php echo ($vo["qy_total_invest"]); ?></td>
										<td><?php echo ($vo["qy_industry_category"]); echo ($vo['qy_status']!='已签约'?'error':''); ?></td>
										<!-- <td><font color="red"><?php echo ($vo["qy_status"]); ?></font></td> -->
										<!-- <td><font color="red"><?php echo ($vo["qy_flag"]); ?></font></td> -->
										<td>
											<a href="/grid_chi/index.php/Admin/Project/seeProjectUI?id=<?php echo ($vo["id"]); ?>&showNum=2">查看</a></td>
										<td>
		<?php if(($vo["zc_status"]) != "已注册"): ?><a href="/grid_chi/index.php/Admin/Project/qyProjectUI?id=<?php echo ($vo["id"]); ?>">编辑</a></td><?php endif; ?>
											<!-- <a href="/grid_chi/index.php/Admin/Project/zcProjectUI?id=<?php echo ($vo["id"]); ?>&toPage=qyProjectMain">变更注册项目</a> -->
										</td>
       <td>
		<?php if(($vo["zc_status"]) != "已注册"): ?><a href="/grid_chi/index.php/Admin/Project/zcProjectUI?id=<?php echo ($vo["id"]); ?>&toPage=qyProjectMain">提交到注册项目</a><?php endif; ?>
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