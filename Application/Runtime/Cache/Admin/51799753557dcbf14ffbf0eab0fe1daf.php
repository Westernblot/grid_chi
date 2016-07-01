<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="/grid_lyj/Public/css/default.css" rel="stylesheet" type="text/css" />
<link href="/grid_lyj/Public/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_lyj/Public/js/goaler.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/jquery.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/systemUtils.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
});


//保存  AND 编辑
function doSave(){

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
					<span>依申请公开-内容回复</span>
				</div>
				<div class="title">
					<a href="javascript:doSave()"  class="btn btn-green">保存</a> 
					<a href="javascript:history.back();" class="btn btn-default"  >返回</a>
				</div>
				
		<div class="develop">
		 <form action="/grid_lyj/index.php/Admin/Ysqgk/update" id="form1" method="post">
		  <input type="hidden" name="id" value="<?php echo ($ysqgk["id"]); ?>">
		   <table width="100%" border="0" class="mtable" >
		   <tr>
		   <td colspan="4"><font color="red"><b>申请人信息:</b></font><?php echo ($ysqgk["persontype"]); ?></td>
		   </tr>
		  
		    <?php if(($ysqgk["persontype"]) == "公民"): ?><tr>
		    <td width="20%">姓名：</td>
		    <td width="30%"><?php echo ($ysqgk["name"]); ?></td>
		    <td width="20%">工作单位：</td>
		    <td width="30%"><?php echo ($ysqgk["workunit"]); ?></td>
		    </tr>
		    <tr>
		    <td>证件名称：</td>
		    <td><?php echo ($ysqgk["cardtype"]); ?></td>
		    <td>证件号码：</td>
		    <td><?php echo ($ysqgk["cardnum"]); ?></td>
		    </tr>
		    <?php else: ?>
		     <tr>
		    <td width="15%">组织机构代码：</td>
		    <td width="35%"><?php echo ($ysqgk["orgcode"]); ?></td>
		    <td width="15%">营业执照代码：</td>
		    <td width="35%"><?php echo ($ysqgk["licensecode"]); ?></td>
		    </tr>
		    <tr>
		    <td>法人代表：</td>
		    <td><?php echo ($ysqgk["legalperson"]); ?></td>
		    <td>联系人：</td>
		    <td><?php echo ($ysqgk["linkperson"]); ?></td>
		    </tr><?php endif; ?>
		    
		   <tr>
		    <td>联系电话：</td>
		    <td><?php echo ($ysqgk["tel"]); ?></td>
		    <td>联系传真：</td>
		    <td><?php echo ($ysqgk["fax"]); ?></td>
		    </tr>
		    <tr>
		    <td>手机号码：</td>
		    <td><?php echo ($ysqgk["phone"]); ?></td>
		    <td>电子邮箱：</td>
		    <td><?php echo ($ysqgk["email"]); ?></td>
		    </tr>
		    <tr>
		    <td>通讯地址：</td>
		    <td><?php echo ($ysqgk["address"]); ?></td>
		    <td>邮政编码：</td>
		    <td><?php echo ($ysqgk["zipcode"]); ?></td>
		    </tr>
		    <tr>
		    <td colspan="4"><font color="red"><b>所需信息情况</b></font></td>
		    </tr>
		    <tr>
		    <td>所需信息内容描述：</td>
		    <td colspan="3"><?php echo ($ysqgk["content"]); ?></td>
		    </tr>
		    <tr>
		    <td>所需信息的索引号：</td>
		    <td colspan="3"><?php echo ($ysqgk["indexnum"]); ?></td>
		    </tr>
		    <tr>
		    <td>用途描述：</td>
		    <td colspan="3"><?php echo ($ysqgk["description"]); ?></td>
		    </tr>
		    <tr>
		    <td>是否申请减免费用：</td>
		    <td ><?php echo ($ysqgk["cut"]); ?></td>
		    <td>信息的指定提供方式：</td>
		    <td ><?php echo ($ysqgk["offerway"]); ?></td>
		    </tr>
		    <tr>
		    <td>获取信息方式：</td>
		    <td ><?php echo ($ysqgk["getway"]); ?></td>
		    <td>是否接受其他方式：</td>
		    <td ><?php echo ($ysqgk["otherway"]); ?></td>
		    </tr>
		     <tr>
		    <td colspan="4"><font color="red"><b>回复情况:</b></font></td>
		    </tr>
		    <tr>
		    <td>回复时间：<font color="red">*</font></td>
		    <td colspan="3">
            <input type="text" id="replydate" name="replydate"  want="yes" title="回复时间" value="<?php echo ((isset($ysqgk["replydate"]) && ($ysqgk["replydate"] !== ""))?($ysqgk["replydate"]):$nowdate); ?>" class="Wdate"  onclick="WdatePicker()">
		    <font color="red">*</font></td>
		    </tr>
		    <tr>
		    <td>回复内容：<font color="red">*</font></td>
		    <td colspan="3">
            <textarea rows="3" cols="30" id="replycontent" name="replycontent" want="yes" title="回复内容"><?php echo ($ysqgk["replycontent"]); ?></textarea>
            </td>
		    </tr>
		   </table>
        </form>
		</div>
		
</div>
</body>
</html>