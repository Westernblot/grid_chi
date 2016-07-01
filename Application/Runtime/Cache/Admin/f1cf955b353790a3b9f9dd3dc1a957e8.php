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
	    function doQuery(){
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
					签约项目一览表
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="btn-toolbar">
						<form class="form-inline" id="form1" action="/grid_chi/index.php/Admin/Project/auditQyProjectMain" method="post">
						
						审核状态:<select id="qy_flag" name="qy_flag">
							<option value="" <?php if(($qy_flag) == ""): ?>selected<?php endif; ?>>-查询全部-</option>
							<option value="审核中" <?php if(($qy_flag) == "审核中"): ?>selected<?php endif; ?>>审核中</option>
							<option value="审核通过" <?php if(($qy_flag) == "审核通过"): ?>selected<?php endif; ?>>审核通过</option>
							<option value="审核未通过" <?php if(($qy_flag) == "审核未通过"): ?>selected<?php endif; ?>>审核未通过</option>
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
						<button class="btn" onclick="doQuery()">查询</button>
						</form>
						
					</div>
					<div class="block-tab">
    <table class="table-mins">
							<thead>
								<tr>
									<!-- <th>
									<input type="checkbox" name="checkbox" id="checkbox" onclick="checkAll(this)">
									</th>
									<th>编号</th> -->
									<th>外来投资方</th>
									<th>签约项目名称</th>
									<th>签约建设内容</th>
									<th>签约时间</th>
									<th>签约总投资额（亿元）</th>
									<th>产业类别</th>
									<th>状态</th>
									<th>审核状态</th>
									<th colspan="2">操作</th>
								</tr>
							</thead>
							<tbody>
								
						<?php if(empty($list)): ?><tr>
							<td colspan="20" align="center"><font color="red">查无数据</font></td>
						</tr><?php endif; ?>

								<?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>">
										<!-- <td>
										<input type="checkbox" name="chk" id="chk">
										</td>
										<td><?php echo ($vo["id"]); ?></td> -->
										<td><?php echo ($vo["qy_outside_investor"]); ?></td>
										<td><?php echo ($vo["qy_project_name"]); ?></td>
										<td><?php echo ($vo["qy_build_content"]); ?></td>
										<td><?php echo ($vo["qy_date"]); ?></td>
										<td><?php echo ($vo["qy_total_invest"]); ?></td>
										<td><?php echo ($vo["qy_industry_category"]); ?></td>
										<td><font color="red"><?php echo ($vo["qy_status"]); ?></font></td>
										<td><font color="red"><?php echo ($vo["qy_flag"]); ?></font></td>
										<td>
											<a href="/grid_chi/index.php/Admin/Project/seeProjectUI?id=<?php echo ($vo["id"]); ?>&showNum=2">查看</a></td>
										<td>
											<!-- <a href="/grid_chi/index.php/Admin/Project/qyProjectUI?id=<?php echo ($vo["id"]); ?>">编辑</a>
											<a href="/grid_chi/index.php/Admin/Project/zcProjectUI?id=<?php echo ($vo["id"]); ?>&toPage=qyProjectMain">变更注册项目</a> -->
										    <?php if(($vo["qy_flag"]) == "审核中"): ?><a href="/grid_chi/index.php/Admin/Project/auditQyProjectUI?id=<?php echo ($vo["id"]); ?>">审核</a><?php endif; ?>
										</td>
									</tr><?php endforeach; endif; ?>

							</tbody>
							<tfoot>
						        <tr>
						          <td colspan="12" style=" padding:0;">
											<div class="block-foot">
											        <ul class="pagination pagination_ml pull-right">
											            <?php echo ($page); ?>
											        </ul>
											</div>
						          </td>
						        </tr>
						      </tfoot>
						</table>
					</div>

				</div>
			</div>
		</div>
	</body>
	
</html>