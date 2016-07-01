<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('HOME_TITLE');?></title>
<link href="/grid_swwyh/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="right_top"><div class="rtop_inner"><h3>调查征集</h3></div></div>

 <div class="wsdc">
  	<h3><?php echo ($wsdc["subject"]); ?></h3>
  	
  <?php if(!empty($baseList)): ?><div align="center">
   	<?php if(($nowdate) > $wsdc["endate"]): ?>已截止投票，谢谢关注！
   		<?php else: ?>
   	<?php if(in_array(($clientIP), is_array($wsdc["ip"])?$wsdc["ip"]:explode(',',$wsdc["ip"]))): ?>你已经投票!
   		<?php else: ?>
    <a href="/grid_swwyh/index.php/Home/Wsdc/wsdcVetoUI?id=<?php echo ($wsdc["id"]); ?>">参与投票</a><?php endif; endif; ?>
   </div><?php endif; ?>
  
  	<div>
  		
  		<?php echo ($wsdc["content"]); ?>
  		
  	</div>
  	
  	<br>
  	<hr></hr>
  	<br>
  
    <define name="num_bk" value="1" ></define>
  	<?php if(is_array($baseList)): foreach($baseList as $bk=>$base): ?><span><?php echo ($bk+1); ?>、<?php echo ($base["name"]); ?></span>
    <table>
    	
    	<?php if(is_array($subList)): foreach($subList as $key=>$sub): if(($sub["pid"]) == $base["id"]): ?><tr>
            <td align="left">&nbsp;<?php echo ($sub["content"]); ?></td>
            <td align="center" width="100">投票数：<?php echo ($sub["num"]); ?></td>
            <td align="center" width="100"><?php echo (round($sub['num']/$base['num']*100,2)); ?>%</td>
            <td align="left" width="160">
                <div class="Cylindrical">
                    <div style="width:<?php echo (round($sub['num']/$base['num']*100,2)); ?>%;height:100%;background:#<?php echo rand(100000,999999);?>"></div>
                </div>
            </td>
            </tr><?php endif; endforeach; endif; ?>
        
    </table><?php endforeach; endif; ?>
 
  	<br>
  

  
    

</body>
</html>