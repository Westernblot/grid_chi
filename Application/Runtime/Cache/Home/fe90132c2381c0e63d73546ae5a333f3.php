<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('HOME_TITLE');?></title>
<link href="/grid_swwyh/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="right_top"><div class="rtop_inner"><h3>在线访谈</h3></div></div>

         <ul class="zxft">
         	<?php if(is_array($zxftList)): foreach($zxftList as $k=>$vo): ?><li>
            <div class="leftPic"><a href="/grid_swwyh/index.php/Home/Zxft/zxftShow?id=<?php echo ($vo["id"]); ?>"><img src="<?php echo ($vo["imgurl"]); ?>" /></a></div>
           <div class="rightM"><a href="/grid_swwyh/index.php/Home/Zxft/zxftShow?id=<?php echo ($vo["id"]); ?>"><B><?php echo ($vo["subject"]); ?></B></a><br/>
                <B>访谈时间：</B><?php echo ($vo["indate"]); ?><br/>
                <div class="ztmswz"><B>主题描述：</B><?php echo ($vo["description"]); ?></div>
           </div>
                 <a href="/grid_swwyh/index.php/Home/Zxft/zxftShow?id=<?php echo ($vo["id"]); ?>" class="btn_input02">点击进入</a>
          </li><?php endforeach; endif; ?>
          <!-- <li>
            <div class="leftPic"><a href="gzhd_zxft_show.html"><img src="images/201210311010035.jpg"/></a></div>
           <div class="rightM"><a href="gzhd_zxft_show.html"><B>访谈主题：陈铁雄厅长就全省国土资源系统开展维护...</B></a><br/>
                <B>访谈时间：</B>2013年11月04日 02:00<br/>
                <div class="ztmswz"><B>主题描述：</B>2013年11月4日下午，省国土资源厅召开全省国土资源系统视频会议，部署开展维护农民合法权益专项行动。会后，陈铁雄厅长接受《浙江日报》记者采访，畅谈本次专项行动有关内容。</div>
           </div>
                 <a href="gzhd_zxft_show.html" class="btn_input02">点击进入</a>
          </li>
          <li>
            <div class="leftPic"><a href="gzhd_zxft_show.html"><img src="images/201210311010035.jpg"/></a></div>
             <div class="rightM"><a href="gzhd_zxft_show.html"><B>访谈主题：建设国土阳光维权工程</B></a><br/>
                 <B>访谈时间：</B>2013年08月22日 10:00<br/>
                 <div class="ztmswz"><B>主题描述：</B>访谈背景：陈铁雄厅长参加浙江之声《阳光行动·厅长在线》直播节目，就征地拆迁工作进行&ldquo;阳光&rdquo;操作等话题，与听众交流国土资源管理工作。　　访谈内容：　　主持人：阳光行动，为和谐中国而动。大家好，我是伟雯，...</div>
              </div>
                 <a href="gzhd_zxft_show.html" class="btn_input02">点击进入</a>
          </li>
          <li>
            <div class="leftPic"><a href="gzhd_zxft_show.html"><img src="images/201210311010035.jpg"/></a></div>
             <div class="rightM"><a href="gzhd_zxft_show.html"><B>访谈主题：建设国土阳光维权工程</B></a><br/>
                 <B>访谈时间：</B>2013年08月22日 10:00<br/>
                 <div class="ztmswz"><B>主题描述：</B>访谈背景：陈铁雄厅长参加浙江之声《阳光行动·厅长在线》直播节目，就征地拆迁工作进行&ldquo;阳光&rdquo;操作等话题，与听众交流国土资源管理工作。　　访谈内容：　　主持人：阳光行动，为和谐中国而动。大家好，我是伟雯，...</div>
              </div>
                 <a href="gzhd_zxft_show.html" class="btn_input02">点击进入</a>
          </li>
          <li>
            <div class="leftPic"><a href="gzhd_zxft_show.html"><img src="images/201210311010035.jpg"/></a></div>
             <div class="rightM"><a href="gzhd_zxft_show.html"><B>访谈主题：建设国土阳光维权工程</B></a><br/>
                 <B>访谈时间：</B>2013年08月22日 10:00<br/>
                 <div class="ztmswz"><B>主题描述：</B>访谈背景：陈铁雄厅长参加浙江之声《阳光行动·厅长在线》直播节目，就征地拆迁工作进行&ldquo;阳光&rdquo;操作等话题，与听众交流国土资源管理工作。　　访谈内容：　　主持人：阳光行动，为和谐中国而动。大家好，我是伟雯，...</div>
              </div>
                 <a href="gzhd_zxft_show.html" class="btn_input02">点击进入</a>
          </li> -->
        </ul>
        <div class='Page'>
           <?php echo ($page); ?>
        </div>
</body>
</html>