<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>黄石市招商局信息报送系统</title>
    <link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
    <link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
</head>

<body>
<div class="content">
        
        <div class="header">
            <!-- <div class="stats">
                <a href="main.html" class="stat"><span class="number">15</span>待办</a>
                <a href="main.html" class="stat"><span class="number">27</span>任务</a>
                <a href="main.html" class="stat"><span class="number">53</span> 通知</a>
            </div> -->

            <h1 class="page-title">报送端系统</h1>
        </div>
        
       <ul class="breadcrumb">
            <li><a href="main.html">首页</a> <span class="divider">/</span></li>
            <li class="active">报送端系统</li>
        </ul>
        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="row-fluid">
    <div class="block span5">
        <p class="block-heading"><a href="/grid_chi/index.php/Admin/News/moreNewsMain" class="label label-warning">更多</a>通知公告</p>
        <div class="block-body b-color" style="height:247px;">
        	
        	
        <table class="table list">
              <tbody>
                      <?php if(empty($list)): ?><tr>
							<td colspan="2" align="center"><font color="red">暂无公告</font></td>
						</tr><?php endif; ?>
              	<?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr>
                  <td><a href="/grid_chi/index.php/Admin/News/seeNewsUI?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
                  <td width="68"><?php echo ($vo["intime"]); ?></td>
                </tr><?php endforeach; endif; ?>
                
              </tbody>
            </table>
           </div>
    </div>

    <div class="block span7">
            <p class="block-heading">系统提示</p>
            <div class="block-body" style="height:247px;">
        	 		<p style="font-size:18px; text-align:center; line-height:36px; margin-top:50px;">
        	 		   本系统可配合外接设备高拍仪，使用该设备时。<br/>
        	 		   为了保证系统兼容性请使用<strong style=" color:#F00;">IE8以上浏览器</strong>或者<strong style=" color:#F00;">360浏览器兼容模式</strong> 访问！
        	 		</p>
        	 		
            </div>
        </div>
</div>

<div class="row-fluid">
    
    <div class="block">
        <p class="block-heading">快捷入口</p>
        <div class="block-body b-color">   
             		<div class="quick-entry">
                        <a href="/grid_chi/index.php/Admin/Project/ztProjectMain" class="bg_lb">在谈项目填报</a>
                        <a href="/grid_chi/index.php/Admin/Project/qyProjectMain" class="bg_lo">签约项目填报</a>
                        <a href="/grid_chi/index.php/Admin/Project/zcProjectMain" class="bg_db">注册项目填报</a>
                        <a href="/grid_chi/index.php/Admin/Project/kgProjectMain" class="bg_dy">开工项目填报</a>
                        <a href="/grid_chi/index.php/Admin/Project/tcProjectMain" class="bg_lr">投产项目填报</a>
                        <a href="/grid_chi/index.php/Admin/Outside/outsideMain" class="bg_dg">驻外招商上报</a>
                    </div>
        </div>
    </div>
    
</div>

                    
                    <footer>
                        <hr>
                         <p>copyright by gridsoft co.,ltd.  2015-2016  版权申明  湖北网格软件开发有限公司 <a href="http://www.gridssoft.com" target="_blank">www.gridssoft.com</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
</body>
</html>