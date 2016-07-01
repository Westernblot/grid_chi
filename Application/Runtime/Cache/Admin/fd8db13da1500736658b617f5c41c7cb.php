<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>账户管理</title>
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
	location.href='/grid_lyj/index.php/Admin/User/delete?ids='+ids;
}

//重置密码
function doResetPWD(){
	var ids = getId('delete'); 
	if(ids==false){
		return;
	}
	//alert(ids);
	location.href='/grid_lyj/index.php/Admin/User/resetPWD?ids='+ids;
}


//条件查询
function doSearch(){
	$('#formQuery').submit();
}


</script>
<body>
<div id="div_right">
	<div class="right_top">
					<span>账户管理</span>
				</div>
				<div class="title">
					<a href="<?php echo U('User/userUI');?>"  class="btn btn-green">新增</a> 
					<a href="javascript:doResetPWD()" class="btn btn-bule">重置密码</a> 				
					<a href="javascript:doDelete()" class="btn btn-red">删除</a> 
					<font color="red">提示：密码重置后全部为1</font>
					<div style="float: right">
						<form action="/grid_lyj/index.php/Admin/User/userList" id="formQuery" method="get">							
						<input type="text" name="username" value="<?php echo ($username); ?>" />
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
							<th width="25%" >登录名</th>
							<th width="30%" >中文名</th>
							<th width="45%" >部门</th>
							<th width="45%" >操作</th>
						</tr>
					<tbody id="goaler">
						<?php if(is_array($userList)): foreach($userList as $key=>$user): ?><tr id="<?php echo ($user["id"]); ?>">
						         <td class="thcheckbox"><input type="checkbox" name="chk" id="chk" onclick="selTr(this);" ></td>
						         <td><?php echo ($user["username"]); ?></td>
						         <td><?php echo ($user["cnname"]); ?></td>
						         <td><?php echo ($user["dept"]); ?></td>						 					         
						         <td>
						         	<a href="<?php echo U('userUI',array('id'=>$user['id']));?>">编辑</a>&nbsp;
						         	<a href="<?php echo U('powerUI',array('id'=>$user['id']));?>">设置权限</a>&nbsp;
						         	
						         </td>						 					         
						      </tr><?php endforeach; endif; ?>
						
					</tbody>
					</table>
		</div>
				<?php echo ($page); ?>
</div>
</body>
</html>