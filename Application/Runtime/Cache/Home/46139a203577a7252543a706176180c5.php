<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('HOME_TITLE');?></title>
<link href="/grid_swwyh/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="right_top"><div class="rtop_inner"><h3>依申请公开</h3></div></div>

<div class="ysqgk_show">
    <table>
        <tr>       
          <td class="TDleft">所需信息内容描述：</td>
        	<td><?php echo ($ysqgk["content"]); ?></td>
        </tr>           
        <tr>
        	<td class="TDleft">所需信息的索引号：</td>
        	<td><?php echo ($ysqgk["indexnum"]); ?></td>
        </tr>
        <tr>
            <td class="TDleft">回复内容：</td>
            <td align="left" valign="top" style="line-height:28px; text-indent:20px;">
       <?php echo ($ysqgk["replycontent"]); ?>
            </td>
        </tr>        
  </table>

</div>

</body>
</html>