<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('HOME_TITLE');?></title>
<link href="/grid_swwyh/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <div class="right_top"><div class="rtop_inner"><h3>民意征集</h3></div></div>
 <div class="list">
      <ul class="column">       
      	<?php if(is_array($myzjList)): foreach($myzjList as $key=>$vo): ?><li><a href="/grid_swwyh/index.php/Home/Myzj/myzjUI?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["subject"]); ?></a><span><?php echo ($vo["indate"]); ?></span></li><?php endforeach; endif; ?>                                        
      
      
      <!-- <li><a href="gzhd_wsdc_vote.html">省林业厅办公室关于开展 涉林非法集资风险专项排查处…</a><span>2012-04-23</span></li>
      <li><a href="gzhd_wsdc_stop.html">黄石市举办首届兰文化艺术展览会</a><span>2012-04-23</span></li>
      <li><a href="gzhd_wsdc_stop.html">新华网：和总书记一起守护绿水青山 </a><span>2015-07-06</span></li> 
      <li><a href="gzhd_wsdc_stop.html">为项目落地当好"马前卒"</a><span>2013-11-21</span></li>  
      
      <li><a href="gzhd_wsdc_show.html">黄石"三园一带"开发建设的思考</a><span>2015-01-27</span></li>   
      <li><a href="gzhd_wsdc_show.html">吴风雨局长接受十一五工作回顾访谈</a><span>2015-01-04 </span></li> -->
  </ul> 
</div>
<div class='Page'>
  <?php echo ($page); ?>
</div>

</body>
</html>