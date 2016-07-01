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

//==========================动态表格添加/删除==================================
function addLine(obj){
	var tr=$(obj).parent().parent();
	var trHtml='<tr>'+$(tr).html()+'</tr>';
	$(tr).after(trHtml);
}

function delLine(obj){
	var tr = $(obj).parent().parent();
	$(tr).remove();
}
//===============================================================================

function sub(){
	
     var checked = checkForm('#form1');
	    if(checked==false){
		   return;
	}
	    
	$('#form1').submit();
}

</script>
</head>
<body style="overflow: auto;">
<div id="div_right">
	<div class="right_top">
					<span>问答修改</span>
				</div>
				<div class="title">
					<a href="javascript:sub()"  class="btn btn-green">保存</a> 
					<a href="javascript:history.back();" class="btn btn-default"  >返回</a>
				</div>
				
		<div class="develop">
		<form action="/grid_lyj/index.php/Admin/Wsdc/wsdcOptionUpdate"  id="form1" method="post">
		   
		   <input type="hidden" name="id" value="<?php echo ($wsdcOption["id"]); ?>" />
		   <input type="hidden" name="wsdc_id" value="<?php echo ($wsdcOption["wsdc_id"]); ?>" />
		   <table width="100%" border="0" class="mtable" >
		   	<caption>
		   		题目：<input type="text" size="100" name="name" value="<?php echo ($wsdcOption["name"]); ?>" /> 
		   		类型：<select name="op" want="yes" title="类型">
		   			  <option value=""   <?php if(($wsdcOption["op"]) == ""): ?>selected<?php endif; ?>  >-请选择-</option>
		   			  <option value="单选"  <?php if(($wsdcOption["op"]) == "单选"): ?>selected<?php endif; ?>   >单选</option>
		   			  <option value="多选"  <?php if(($wsdcOption["op"]) == "多选"): ?>selected<?php endif; ?>  >多选</option>
		   		    </select>
		   		   
		   	</caption>
		   <tr>
		    
		   </tr>
		   
		   </table>
		</form>
		</div>
		
</div>
</body>
</html>