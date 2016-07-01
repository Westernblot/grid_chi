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


//提交投票
function subVeto(){
	
	var sl='<?php echo ($sl); ?>';//问卷调查的填写条目数
	
	var chk='0';
	var wr='0';
	var num=0;
	//多选
	$('input[type="checkbox"]').each(function(index,obj){
       if($(obj).attr('checked')){
       	chk+=","+$(obj).val();
       	var pid=$(obj).attr('id');
       	if (wr.indexOf(pid)<0){
       	  wr+=","+pid;
       	  num++;
       	}
       }
    });
	
	//单选
	$('input[type="radio"]').each(function(index,obj){
       if($(obj).attr('checked')){
       	chk+=","+$(obj).val();
       	var pid=$(obj).attr('id');
       	if (wr.indexOf(pid)<0){
       	  wr+=","+pid;
       	  num++;
       	}
       }
    });
    
    //alert(wr);
    //alert(num+","+sl);
    
    if(num<sl){
      alert('请填写完整，再提交');
      return;
    }
    
    var id='<?php echo ($wsdc["id"]); ?>';
	var flag= PublicAjax('/grid_swwyh/index.php/Home/Wsdc/wsdcVeto',{'id':id,'ids':chk});
	if(flag>0){
		alert('投票成功!');
		location.href="/grid_swwyh/index.php/Home/Wsdc/wsdcShow?id="+id;
	}else{
		alert('投票失败!');
	}
}

</script>

<body>
  <div class="right_top"><div class="rtop_inner"><h3>调查征集</h3></div></div>

 <div class="wsdc_vote">
     <h3><?php echo ($wsdc["subject"]); ?></h3>
     
     <form id="form1" method="post">
     	
    <?php if(is_array($baseList)): foreach($baseList as $bk=>$base): ?><span><?php echo ($bk+1); ?>、<?php echo ($base["name"]); ?></span>
    
        <p>
    	<?php if(is_array($subList)): foreach($subList as $sk=>$sub): if(($sub["pid"]) == $base["id"]): if(($base["op"]) == "单选"): ?><input id="<?php echo ($sub["pid"]); ?>" name="answer_<?php echo ($bk); ?>" type="radio" value="<?php echo ($sub["id"]); ?>" />
                      <?php echo ($sub["content"]); ?><br/><?php endif; ?>	
    			<?php if(($base["op"]) == "多选"): ?><input id="<?php echo ($sub["pid"]); ?>" name="answer" type="checkbox" value="<?php echo ($sub["id"]); ?>" />
                      <?php echo ($sub["content"]); ?><br/><?php endif; endif; endforeach; endif; ?>
        </p><?php endforeach; endif; ?>
     
     </form>
     
     
     <div style="text-align:center;">	
        <input type="button" id="submit" value="提交信息" onclick="subVeto();" class="button" />   	
         <a href="/grid_swwyh/index.php/Home/Wsdc/wsdcShow?id=<?php echo ($wsdc["id"]); ?>" class="button">查看结果</a>
      </div>
      </div>

</body>
</html>