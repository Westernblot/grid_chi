<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台管理系统</title>
<link href="/grid_swwyh/Public/css/frame.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_swwyh/Public/js/jquery.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/menu.js"></script>
</head>
<body style="background:url(/grid_swwyh/Public/images/sys/left_bg.png) repeat-x center top #417EB7;overflow-x:hidden">
	<div id="div_left">
				<div class="left_top">
					<a href="/grid_swwyh/index.php/Admin/Index/right" target="mainFrame">功能菜单栏</a>
				</div>
				<div class="menu"  >
					<ul>
													
				<?php if(is_array($_SESSION['menu'])): foreach($_SESSION['menu'] as $k=>$base): if($base["pid"] == 0): if($k == 0): ?><li>
							<div class="acc_trigger active" id="sub_<?php echo ($base["id"]); ?>">
								<img src="/grid_swwyh/Public/images/sys/star_1.png" /> <?php echo ($base["name"]); ?>
							</div>
							
							<ul class="child_sub_<?php echo ($base["id"]); ?>" style="display: block;">		
							   
							<?php if(is_array($_SESSION['menu'])): foreach($_SESSION['menu'] as $key=>$sub): if($sub[pid] == $base[id]): ?><li><a href="/grid_swwyh/index.php/<?php echo ($sub["action"]); ?>" target="mainFrame"><?php echo ($sub["name"]); ?></a></li><?php endif; endforeach; endif; ?>
							
							</ul>						
						</li><?php endif; ?>
						
						
					<?php if($k != 0): ?><li>
							<div class="acc_trigger" id="sub_<?php echo ($base["id"]); ?>">
								<img src="/grid_swwyh/Public/images/sys/star_1.png" /> <?php echo ($base["name"]); ?>
							</div>
							
							<ul class="child_sub_<?php echo ($base["id"]); ?>" >		
							   
							<?php if(is_array($_SESSION['menu'])): foreach($_SESSION['menu'] as $key=>$sub): if($sub[pid] == $base[id]): ?><li><a href="/grid_swwyh/index.php/<?php echo ($sub["action"]); ?>" target="mainFrame"><?php echo ($sub["name"]); ?></a></li><?php endif; endforeach; endif; ?>
							
							</ul>						
						</li><?php endif; endif; endforeach; endif; ?>
						
					</ul>
				</div>

			</div>
</body>
</html>