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
	location.href='/grid_lyj/index.php/Admin/Gzhd/delete?type=<?php echo ($type); ?>&ids='+ids;
}


//条件查询
function doSearch(){
	$('#formQuery').submit();
}


</script>
<body>
<div id="div_right">
	<div class="right_top">
					<span><?php echo ($type); ?></span>
				</div>
				<div class="title">
					<a href="javascript:doDelete()" class="btn btn-red">删除</a> 
					
					<div style="float: right">
						<form action="/grid_lyj/index.php/Admin/Gzhd/gzhdMain" id="formQuery" method="get">							
						<input type="hidden" name="type" value="<?php echo ($type); ?>" />
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
							<th width="10%" >来信编号</th>
							<th width="30%" >来信标题</th>
							<th width="15%" >类型</th>
							<th width="15%" >来信人</th>
							<th width="15%" >来信时间</th>
							<th width="15%" >状态</th>
							<th width="5%" >前台显示</th>
							<th width="15%" >操作</th>
						</tr>
					<tbody id="goaler">
						<?php if(is_array($gzhdList)): foreach($gzhdList as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>">
						         <td class="thcheckbox"><input type="checkbox" name="chk" id="chk" onclick="selTr(this);" ></td>
						         <td><?php echo ($vo["keynum"]); ?></td>
						         <td><?php echo ($vo["subject"]); ?></td>
						         <td><?php echo ($vo["aim"]); ?></td>
						         <td><?php echo ($vo["name"]); ?></td>						 					         
						         <td><?php echo ($vo["indate"]); ?></td>						 					         
						         <td><?php echo ($vo["status"]); ?></td>						 					         
						         <td><?php echo ($vo["isshow"]); ?></td>						 					         
						         <td>
						         						    		
						         	<a href="/grid_lyj/index.php/Admin/Gzhd/gzhdUI?id=<?php echo ($vo["id"]); ?>&type=<?php echo ($type); ?>">回复</a>&nbsp;						    		         	
						         </td>						 					         
						      </tr><?php endforeach; endif; ?>
						
					</tbody>
					</table>
		</div>
				<?php echo ($page); ?>
</div>
</body>
</html>