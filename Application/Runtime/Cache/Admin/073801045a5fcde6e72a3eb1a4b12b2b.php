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
					<span>进入问答</span>
				</div>
				<div class="title">
					<a href="javascript:sub()"  class="btn btn-green">保存</a> 
					<a href="javascript:history.back();" class="btn btn-default"  >返回</a>
				</div>
				
		<div class="develop">
		<form action="/grid_lyj/index.php/Admin/Wsdc/wsdcOptionInsert"  id="form1" method="post">
		   
		   <input type="hidden" name="wsdc_id" value="<?php echo ($wsdcId); ?>" />
		   <table width="100%" border="0" class="mtable" >
		   	<caption>
		   		题目：<input type="text" size="100" name="name" value="" /> 
		   		类型：<select name="op" want="yes" title="类型">
		   			  <option value="">-请选择-</option>
		   			  <option value="单选">单选</option>
		   			  <option value="多选">多选</option>
		   		    </select>
		   	</caption>
		   <tr>
		    <th width="70%">选项</th>
		    <th width="30%">操作</th>
		   </tr>
		   <tr>
		   <td>
		   	<input type="text" size="100" name="content[]" want="yes" title="选项" />
		   </td>
		   <td>
		   	<a href="javascript:#" onclick="addLine(this)">添加一行</a>&nbsp;
		   	<a href="javascript:#" onclick="delLine(this)">删除一行</a>
		   </td>
		   </tr>
		   <tr>
		   <td>
		   	<input type="text" size="100" name="content[]" want="yes" title="选项" />
		   </td>
		   <td>
		   	<a href="javascript:#" onclick="addLine(this)">添加一行</a>&nbsp;
		   	<a href="javascript:#" onclick="delLine(this)">删除一行</a>
		   </td>
		   </tr>
		   
		   </table>
		</form>
		</div>
		
</div>
</body>
</html>