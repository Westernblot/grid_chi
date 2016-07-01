<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>..</title>
<link href="/grid_lyj/Public/css/default.css" rel="stylesheet" type="text/css" />
<link href="/grid_lyj/Public/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_lyj/Public/js/goaler.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/jquery.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/systemUtils.js"></script>
</head>
<script type="text/javascript">
$(function(){
	
});

//删除
function doDelete(){
	var ids = getId('delete'); 
	if(ids==false){
		return;
	}
	//alert(ids);
	location.href='/grid_lyj/index.php/Admin/Ysqgk/delete?ids='+ids;
}


//条件查询
function doSearch(){
	$('#formQuery').submit();
}


</script>
<body>
<div id="div_right">
	<div class="right_top">
					<span>依申请公开</span>
				</div>
				<div class="title">
					<a href="javascript:doDelete()" class="btn btn-red">删除</a> 
					
					<div style="float: right">
						<form action="/grid_lyj/index.php/Admin/Ysqgk/ysqgkMain" id="formQuery" method="get">							
						来信编号:<input type="text" name="keynum" value="<?php echo ($keynum); ?>" />
						<a href="javascript:doSearch()" class="btn btn-bule">查询</a> 
						</form>
					</div>
				</div>
				<!-- 
				style="height:400px;overflow:auto;"
				 -->
		<div class="develop"  >
					<table width="100%" border="0" class="mtable">
						<tr>
							<th class="thcheckbox" width="3%" ><input type="checkbox"
								name="checkbox" id="checkbox" onclick="checkAll(this);" ></th>						
							<th width="15%" >申请单编码</th>
							<th width="15%" >查询密码</th>
							<th width="25%" >人员类别</th>
							<th width="30%" >联系电话</th>
							<th width="45%" >通讯地址</th>
							<th width="45%" >是否申请减免费用</th>
							<th width="45%" >是否接受其他方式</th>
							<th width="45%" >状态</th>
							<th width="45%" >提交时间</th>
							<th width="15%" >操作</th>
						</tr>
					<tbody id="goaler">
						
						<?php if(empty($ysqgkList)): ?><tr>
							<td colspan="11" align="center"><font color="red">暂无记录</font></td>
						</tr><?php endif; ?>
						
						<?php if(is_array($ysqgkList)): foreach($ysqgkList as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>">
						         <td class="thcheckbox"><input type="checkbox" name="chk" id="chk" onclick="selTr(this);" ></td>
						         <td><?php echo ($vo["keynum"]); ?></td>
						         <td><?php echo ($vo["selcode"]); ?></td>
						         <td><?php echo ($vo["persontype"]); ?></td>
						         <td><?php echo ($vo["tel"]); ?></td>						 					         
						         <td><?php echo ($vo["address"]); ?></td>						 					         
						         <td><?php echo ($vo["cut"]); ?></td>						 					         
						         <td><?php echo ($vo["otherway"]); ?></td>						 					         
						         <td><font color="red"><?php echo ($vo["status"]); ?></font></td>						 					         
						         <td><?php echo ($vo["indate"]); ?></td>						 					         
						         <td>
						         						    		
						         	<a href="/grid_lyj/index.php/Admin/Ysqgk/ysqgkUI?id=<?php echo ($vo["id"]); ?>">回复</a>&nbsp;						    		         	
						         </td>						 					         
						      </tr><?php endforeach; endif; ?>
						
					</tbody>
					</table>
		</div>
				<?php echo ($page); ?>
</div>
</body>
</html>