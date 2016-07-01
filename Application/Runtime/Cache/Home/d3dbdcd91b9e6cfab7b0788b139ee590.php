<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('HOME_TITLE');?></title>
<link href="/grid_swwyh/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
</head>

<body>

         <div class="show">
        <div class="show-title"><?php echo ($zxft["title"]); ?></div>
        <div class="show-lable">发布时间:<?php echo ($zxft["indate"]); ?>　　来源：<?php echo ($zxft["source"]); ?></div>
        
        <?php echo ($zxft["content"]); ?>
        
        </div>

</body>
</html>