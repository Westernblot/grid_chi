<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>黄石市招商局信息报送系统</title>
		<link href="/grid_chi/Public/css/frame.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="/grid_chi/Public/layer/jquery-1.9.1.js"></script>
		<script type="text/javascript">
			
			//选择
			function chMe(obj){
				//alert($(obj).parent().parent().find('a').length);
				$(obj).parent().parent().find('a').removeClass('active');
				$(obj).addClass('active');
			}
			
			//清除所有
			function clearAll(obj){
				$(obj).parent().find('a').removeClass('active');
			}
			
		</script>
	</head>
<body>

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;">
  <tr>
    <td rowspan="2" width="187" id="frmTitle" noWrap name="fmTitle" align="center" valign="top" height="100%">
    	<div id="div_left">
			<div class="gs_logo"><img src="/grid_chi/Public/images/frame/top_logo.png" style="margin-top: 20px;"/></div>
			<div class="sidebar-nav">			
				<?php if(is_array($_SESSION['menuList'])): foreach($_SESSION['menuList'] as $k=>$base): if(($base['pid']) == "0"): ?><a id="sub0<?php echo ($k); ?>" class="menu" onclick="clearAll(this)"><h3>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($base["name"]); ?></h3><i class="ico_menuarrow"></i></a>
						<ul class="i-sub0<?php echo ($k); ?> nav-list">
						<?php if(is_array($_SESSION['menuList'])): foreach($_SESSION['menuList'] as $key=>$sub): if(($sub['pid']) == $base['id']): ?><li>
						       <a onclick="chMe(this)" class="" href="/grid_chi/index.php/<?php echo ($sub["action"]); ?>" target="frmright"><?php echo ($sub["name"]); ?></a>
					        </li><?php endif; endforeach; endif; ?>
						</ul><?php endif; endforeach; endif; ?>
			</div>
		</div>
    </td>
    <td rowspan="2" width="8" valign="middle" background="/grid_chi/Public/images/main_12.gif" onclick="switchSysBar()"><span style=" cursor:pointer; "><img src="/grid_chi/Public/images/main_18.gif" name="img1" width=8 height=52 id=img1></span></td>
    <td align="center" valign="top" height="40" width="100%">
    	<div class="top">
				<ul class="top_icon fr">
					<li>
						<a class="username"> <span><img src="/grid_chi/Public/images/frame/1.jpg"/></span>
						<p>
							<strong><?php echo ($_SESSION['user']['username']); ?></strong>
							<br/>
							<em><?php echo ($_SESSION['user']['dept']); ?></em>
						</p> 
						</a>
					</li>
					<li>
						<a href="/grid_chi/index.php/Admin/Index/main" target="frmright" class="top_a"><i class="hIcon ico_jsq"></i><em>回到首页</em></a>
					</li>
					<li>
						<a href="/grid_chi/index.php/Admin/User/setPwdUI?id=<?php echo ($_SESSION['user']['id']); ?>" target="frmright" class="top_a"><i class="hIcon ico_sz"></i><em>修改密码</em></a>
					</li>
					<li>
						<a href="/grid_chi/index.php/Admin/Login/quit" class="top_a"><i class="hIcon ico_tc"></i><em>退出</em></a>
					</li>
					
				</ul>
			</div>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" height="100%" width="100%"><iframe id="frmright" name="frmright" src="/grid_chi/index.php/Admin/Index/main.html" frameborder="0" height="100%" width="100%" allowtransparency="true">浏览器不支持嵌入式框架，或被配置为不显示嵌入式框架。</iframe>
    </td>
  </tr>
</table>
<script type="text/javascript" src="/grid_chi/Public/js/menu.js"></script> 
<script>
	function switchSysBar(){ 
		var locate=location.href.replace('index.html','');
		var src=document.all("img1").src.replace(locate,'');
		//alert(src);
		if (src.indexOf("images/main_18.gif")!=-1){ 
			document.all("img1").src="/grid_chi/Public/images/main_18_1.gif";
			document.all("frmTitle").style.display="none"; 
		} 
		else{ 
			document.all("img1").src="/grid_chi/Public/images/main_18.gif";
			document.all("frmTitle").style.display=""; 
		} 
	} 
</script> 

	</body>
</html>