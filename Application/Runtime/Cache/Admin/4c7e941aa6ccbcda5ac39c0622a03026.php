<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="/grid_lyj/Public/css/default.css" rel="stylesheet" type="text/css" />
<link href="/grid_lyj/Public/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_lyj/Public/js/goaler.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
});


//保存  AND 编辑
function doSave(){

	var checked = checkForm('#form1');
	if(checked==false){
		return;
	}
	

    	url="mUserInsert.do";
    	//验证唯一性
    	var fUname=$('#fUname').val();
    	var flag=PublicAjax('mCheckUser.do?math='+Math.random(),{'fUname':fUname}); 
    	if(flag>0){
    		alert("账户已存在");
    	    return;
    	}

	//验证两次输入密码是否一样
	var fPassword=$('#fPassword').val();
	var verifyPwd=$('#verifyPwd').val();
	if(fPassword!=verifyPwd){
		alert("两次输入的密码不一致");
		return;
	}
    
	$.ajax({
		url:url,
		data:$('#form1').serialize(),
		dataType:'json',
		type:'post',
		success:function(data){
			if(data>0){
				alert("操作成功");
			    location.href='mUserMain.do';
			}else{
				alert("操作失败");
			}
		},
		error:function(){
			alert("系统错误");
		}
	});
}

function sub(){
	$('#form1').submit();
}

</script>
</head>
<body style="overflow: auto;">
<div id="div_right">
	<div class="right_top">
					<span><?php echo ($type); ?></span>
				</div>
				<div class="title">
					<a href="javascript:sub()"  class="btn btn-green">保存</a> 
					<a href="javascript:history.back();" class="btn btn-default"  >返回</a>
				</div>
				
		<div class="develop">
		<form action="/grid_lyj/index.php/Admin/Gzhd/update"  id="form1" method="post">
		   
		   <input type="hidden" name="type" value="<?php echo ($type); ?>" />
		   <input type="hidden" name="id" value="<?php echo ($gzhd["id"]); ?>" />
		   <table width="100%" border="0" class="mtable" >
		   <tr>
		   	<td align="right">信息标题</td>
		   	<td colspan="3"></td>
		   </tr>
		   <tr>
		   	<td align="right" width="20%">来信人</td>
		   	<td width="30%"><?php echo ($gzhd["name"]); ?></td>
		   	<td align="right" width="20%">来信时间</td>
		   	<td width="30%"><?php echo ($gzhd["indate"]); ?></td>
		   </tr>
		   <tr>
		   	<td align="right" >来信内容</td>
		   	<td colspan="3"><?php echo ($gzhd["content"]); ?></td>
		   </tr>
		   <tr>
		   	<td align="right" >回复部门</td>
		   	<td ><input type="text" id="replydept" name="replydept" value="<?php echo ((isset($gzhd["replydept"]) && ($gzhd["replydept"] !== ""))?($gzhd["replydept"]):$dept); ?>" /></td>
		   	<td align="right" >回复时间</td>
		   	<td ><input type="text" id="replydept" name="replydate" value="<?php echo ((isset($gzhd["replydate"]) && ($gzhd["replydate"] !== ""))?($gzhd["replydate"]):$nowdate); ?>" /></td>
		   </tr>
		   <tr>
		   	<td align="right" >处理状态</td>
		   	<td ><?php echo ($gzhd["status"]); ?></td>
		   	<td align="right" >信件类型</td>
		   	<td ><?php echo ($gzhd["aim"]); ?></td>
		   </tr>
		   <tr>
		   	<td align="right" >是否属实</td>
		   	<td >
		   		<input type="radio" name="istrue" value="否" <?php if(((isset($gzhd["istrue"]) && ($gzhd["istrue"] !== ""))?($gzhd["istrue"]):'否') == "否"): ?>checked<?php endif; ?>  />否
		   		<input type="radio" name="istrue" value="是" <?php if(((isset($gzhd["istrue"]) && ($gzhd["istrue"] !== ""))?($gzhd["istrue"]):'否') == "是"): ?>checked<?php endif; ?>  />是
		   	</td>
		   	<td align="right" >是否前台显示</td>
		   	<td >
		   		<input type="radio" name="isshow" value="否" <?php if(((isset($gzhd["isshow"]) && ($gzhd["isshow"] !== ""))?($gzhd["isshow"]):'否') == "否"): ?>checked<?php endif; ?> />否
		   		<input type="radio" name="isshow" value="是" <?php if(((isset($gzhd["isshow"]) && ($gzhd["isshow"] !== ""))?($gzhd["isshow"]):'否') == "是"): ?>checked<?php endif; ?> />是
		   	</td>
		   </tr>
		   <tr>
		   	<td align="right" >回复内容</td>
		   	<td colspan="3">
		   		<textarea id="replycontent" name="replycontent"><?php echo ($gzhd["replycontent"]); ?></textarea>
		   	</td>
		   </tr>
		   </table>
		</form>
		</div>
		
</div>
</body>
</html>