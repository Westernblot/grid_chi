<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>黄石市林业局</title>
<link href="/grid_lyj/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="nymain_title"><h3>公众留言</h3></div>
      <div class="box_lxck">
         <table>
             <tr bgcolor="#F5F5F5"></tr>
             <tr bgcolor="#E3F2EC">
               <!-- <td height="20" colspan="4" align="center" bgcolor="#FFF9E6"><span class="red">没有查找到信件！</span></td> -->
             </tr>
             <tr bgcolor="#E3F2EC">
               <td height="50" align="center" bgcolor="#FFF9E6"><strong>信息标题</strong></td>
               <td colspan="3" align="left" bgcolor="#FFF9E6"><?php echo ($gzhd["subject"]); ?></td>
             </tr>
             <tr>
               <td width="15%" height="30" align="center"><strong>来 信 人</strong></td>
               <td width="35%"><?php echo ($gzhd["name"]); ?></td>
               <td width="15%" align="center"><strong>来信时间</strong></td>
               <td width="35%"><?php echo ($gzhd["indate"]); ?></td>
             </tr>
             <tr>
               <td width="15%" height="100" align="center"><strong>来信内容</strong></td>
               <td height="100" colspan="3" valign="top" align="left"><?php echo ($gzhd["content"]); ?></td>
             </tr>
             <tr bgcolor="#F5F5F5">
               <td width="15%" height="30" align="center"><strong>回信部门</strong></td>
               <td width="35%" bgcolor="#F5F5F5"><?php echo ($gzhd["replydept"]); ?></td>
               <td width="15%" align="center" bgcolor="#F5F5F5"><strong>回信时间</strong></td>
               <td width="35%" bgcolor="#F5F5F5"><?php echo ($gzhd["replydate"]); ?></td>
             </tr>
             <tr bgcolor="#F5F5F5">
               <td width="15%" height="30" align="center"><strong>处理状态</strong></td>
               <td width="35%" bgcolor="#F5F5F5"><?php echo ($gzhd["status"]); ?></td>
               <td width="15%" align="center" bgcolor="#F5F5F5"><strong>信件类型</strong></td>
               <td width="35%" height="30" bgcolor="#F5F5F5"><?php echo ($gzhd["aim"]); ?></td>
             </tr>
             <tr>
               <td width="15%" height="30" align="center"><strong>是否属实</strong></td>
               <td width="35%" colspan="3" align="left"><?php echo ($gzhd["istrue"]); ?></td>
             </tr>
             <tr bgcolor="#F5F5F5">
               <td width="15%" height="100" align="center"><strong>回信内容</strong></td>
               <td width="35%" colspan="3" align="left"><?php echo ($gzhd["replycontent"]); ?></td>
             </tr>
        </table>
    	</div>
</body>
</html>