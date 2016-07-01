<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="/grid_lyj/Public/css/default.css" rel="stylesheet" type="text/css" />
<link href="/grid_lyj/Public/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_lyj/Public/js/goaler.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/jquery.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/systemUtils.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
});



function sub(){
	
	var checked = checkForm('#form1');
	if(checked==false){
		return;
	}
	
	//验证两次输入密码是否一样
	var password=$('#password').val();
	var verifyPwd=$('#verifyPwd').val();
	if(password!=verifyPwd){
		alert("两次输入的密码不一致");
		return;
	}
	
	$('#form1').submit();
}

</script>
</head>
<body style="overflow: auto;">
<div id="div_right">
	<div class="right_top">
					<span>个人密码修改</span>
				</div>
				<div class="title">
					<a href="javascript:sub()"  class="btn btn-green">保存</a> 
				</div>
				
		<div class="develop">
		<form action="/grid_lyj/index.php/Admin/User/updatePassword"  id="form1" method="post">
		   
		   <input type="hidden" name="id" value="<?php echo ($user["id"]); ?>" />
		   <table width="100%" border="0" class="mtable" >
		   <tr>
		   <td align="right" >账户：</td>
		   <td ><?php echo ($user["username"]); ?></td>
		   </tr>
		   <tr>
		   <td align="right" >密码：</td>
		   <td >
		   <input type="password" id="password" name="password" value="" want="yes" title="密码" >
		   <font color="red">*</font>
		   </td>
		   </tr>
		   
		   <tr>
		   <td align="right" >确认密码：</td>
		   <td >
		   <input type="password" id="verifyPwd" name="verifyPwd" value="" want="yes" title="确认密码"  >
		   <font color="red">*</font>
		   </td>
		   </tr>
		
		   </table>
		</form>
		</div>
		
</div>
</body>
</html>