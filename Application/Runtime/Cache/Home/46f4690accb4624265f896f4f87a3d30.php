<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('HOME_TITLE');?></title>
<link href="/grid_swwyh/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_swwyh/Public/js/jquery.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/systemUtils.js"></script>
</head>

<script type="text/javascript">


//提交
function sub(){

	var flag= PublicAjax('/grid_swwyh/index.php/Home/Myzj/insert',$('#form1').serialize());
	if(flag>0){
		alert('操作成功!');
		location.href="/grid_swwyh/index.php/Home/Myzj/myzjList";
	}else{
		alert('操作失败!');
	}
}

</script>

<body>
 <div class="right_top"><div class="rtop_inner"><h3>民意征集</h3></div></div>

 <div class="wsdc_vote">
 	<form id="form1" action="/grid_swwyh/index.php/Home/Myzj/insert" method="post">
     <input type="hidden" name="myzj_id" value="<?php echo ($myzj["id"]); ?>" />
      <p><h3><?php echo ($myzj["subject"]); ?></h3>
     <textarea name="content" id="content" cols="60" rows="6"></textarea>
     </p>
     <br>
     <div style="text-align:center;">	
        <input type="button" id="submit" value="提交信息" onclick="sub();" class="button" />   	
      </div>
 	</form>
     
</div>

</body>
</html>