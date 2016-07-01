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
	var id='<?php echo ($wsdc["id"]); ?>';
	var ids = getId('delete'); 
	if(ids==false){
		return;
	}
	//alert(ids);
	location.href='/grid_lyj/index.php/Admin/Wsdc/wsdcOptionDelte?ids='+ids+'&id='+id;
}


//条件查询
function doSearch(){
	$('#formQuery').submit();
}


</script>
<body>
<div id="div_right">
	<div class="right_top">
					<span>网上调查问答</span>
				</div>
				<div class="title">
					<a href="/grid_lyj/index.php/Admin/Wsdc/wsdcMain" class="btn btn-default"  >返回</a>
					<a href="/grid_lyj/index.php/Admin/Wsdc/wsdcOptionUI?id=<?php echo ($wsdc["id"]); ?>"  class="btn btn-green">新增</a> 				
					<a href="javascript:doDelete()" class="btn btn-red">删除</a> 				
				</div>
				<!-- 
				style="height:400px;overflow:auto;"
				 -->
		<div class="develop"  >
					<table width="100%" border="0" class="mtable">
						<caption><h1><?php echo ($wsdc["subject"]); ?></h1></caption>
						<tr>
							<th class="thcheckbox" width="50" ><input type="checkbox"
								name="checkbox" id="checkbox" onclick="checkAll(this);" ></th>
							<th width="70%" >题目</th>
							<th width="15%" >投票数</th>						
							<th width="15%" >操作</th>
						</tr>
					<tbody id="goaler">
						<?php if(empty($baseList)): ?><tr>
							<td colspan="5" align="center"><font color="red">暂无记录</font></td>
						</tr><?php endif; ?>
						
						<?php if(is_array($baseList)): foreach($baseList as $k=>$base): ?><tr id="<?php echo ($base["id"]); ?>">
						         <td class="thcheckbox"><input type="checkbox" name="chk" id="chk" onclick="selTr(this);" ></td>
						         <td><?php echo ($k+1); ?>、<?php echo ($base["name"]); ?>(<?php echo ($base["op"]); ?>)</td>
						         <td></td>					     					 					         
						         <td>
						         	<a href="<?php echo U('wsdcOptionBaseUpdateUI',array('id'=>$base['id']));?>">编辑</a>&nbsp;
						         </td>						 					         
						      </tr>
						      <?php if(is_array($subList)): foreach($subList as $key=>$sub): if(($sub["pid"]) == $base["id"]): ?><tr id="<?php echo ($base["id"]); ?>">
						         <td class="thcheckbox"><input type="checkbox" name="chk" id="chk" onclick="selTr(this);" ></td>
						         <td>　　<?php echo ($sub["content"]); ?></td>
						         <td>　　<?php echo ($sub["num"]); ?></td>						 					         					       
						         <td>
						         	<a href="<?php echo U('wsdcOptionSubUpdateUI',array('id'=>$sub['id']));?>">编辑</a>&nbsp;
						         </td>						 					         
						      </tr><?php endif; endforeach; endif; endforeach; endif; ?>
						
					</tbody>
					</table>
		</div>
				<?php echo ($page); ?>
</div>
</body>
</html>