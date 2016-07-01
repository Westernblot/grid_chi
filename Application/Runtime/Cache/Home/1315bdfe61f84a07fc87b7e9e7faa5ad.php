<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('HOME_TITLE');?></title>
<link href="/grid_swwyh/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_swwyh/Public/js/tab.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/jquery.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/systemUtils.js"></script>
</head>

<script type="text/javascript">
	
	
    //公众互动提交
	function gzhd(){
		location.href="/grid_swwyh/index.php/Home/Gzhd/gzhd?type=<?php echo ($type); ?>";
	}
	
	//公众互动列表
	function gzhdList(){
		location.href="/grid_swwyh/index.php/Home/Gzhd/gzhdList?type=<?php echo ($type); ?>";
	}
	
	//查询
	function doSearch(){
		var checked = checkForm('#form1');
	    if(checked==false){
		    return;
	     }
	    $('#form1').submit();
	}
	
</script>

<body>
<div class="box_title">
       <p>　　欢迎使用&ldquo;<?php echo ($type); ?>&rdquo;系统，请将您的意见与建议填入以下表单，我们将在规定办理期限内答复。内容涉及法律责任将由用户承担，请注意所提供信息的真实性和准确性注：请认真填表格（带*项不能为空）</p>
     </div>
     <div class="nygzhd">
         <ul class="conTopA">
              <li class="active" id="news02" onclick="gzhdList()">信件查询</li>
              <li class="normal" id="news01" onclick="gzhd()">我要写信</li>
          </ul>
          <div class="conA">
             
       <div id="n02" >
       	<form action="/grid_swwyh/index.php/Home/Gzhd/gzhdSelect" id="form1" method="get">
       		<input type="hidden" name="type" value="<?php echo ($type); ?>" />
<table border="0" class="query">
<tr>
<td class="query_title"><B>信件查询</B></td>
  <td>信件编号<font color="red">*</font>
  <input type="text" name="keynum" size="15" value="<?php echo ($keynum); ?>" want="yes" title="信件编号" /></td>
  <td>查询码<font color="red">*</font>
  <input type="text" name="selcode" size="15" value="<?php echo ($selcode); ?>" want="yes" title="查询码" /></td>
  <td><input name="query" type="button" value="查询" class="button" onclick="doSearch()" style="height:21px;line-height:19px;" /></td>
</tr>
</table>
       	</form>

<div class="box_email_title">
    <div class="left"><h3>来信选登</h3></div>	
    <div class="right">有效信件<?php echo ($totalRows); ?>封，回复<?php echo ($replyCount); ?>封，正在办理<?php echo ($totalRows-$replyCount); ?>封</div>
</div>
<div class="box_email">
     <ul class="column">         
     	
     	<?php if(empty($gzhdList)): ?>无相关记录<?php endif; ?>
     	
     	<?php if(is_array($gzhdList)): foreach($gzhdList as $key=>$vo): ?><li><a href="/grid_swwyh/index.php/Home/Gzhd/gzhdShow?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["subject"]); ?></a><em><?php echo ($vo["status"]); ?></em><span><?php echo ($vo["indate"]); ?></span></li><?php endforeach; endif; ?>
     	                                      
        <!-- <li><a href="gzhd_lxck.html">如何查询林权证档案</a><em>已办结</em><span>2013-04-08</span></li>
        <li><a href="gzhd_lxck.html">请教天蛾类害虫的一些防治方法？</a><em>已办结</em><span>2012-04-23</span></li>
        <li><a href="gzhd_lxck.html">非林业用地上林木自主采伐是啥意思</a><em>已办结</em><span>2015-07-06</span></li> 
        <li><a href="gzhd_lxck.html">捕杀候鸟屡禁不止怎么办？</a><em>已办结</em><span>2013-11-21</span></li>  
         
        <li><a href="gzhd_lxck.html">林业三大产业指什么</a><em>已办结</em><span>2015-02-25</span></li>   
        <li><a href="gzhd_lxck.html">承包地砍伐问题</a><em>已办结</em><span>2012-04-23</span></li>
        <li><a href="gzhd_lxck.html">公益林能否再纳入封山育林</a><em>已办结</em><span>2015-07-06</span></li> 
        <li><a href="gzhd_lxck.html">禁伐区能否采集山野菜</a><em>已办结</em><span>2013-11-21</span></li>   
        <li><a href="gzhd_lxck.html">枣树红蜘蛛的防治</a><em>已办结</em><span>2013-11-21</span></li>  -->  
    </ul> 
    <div class='Page'>
       <?php echo ($page); ?>
    </div>
 </div> 
              </div>
              
          </div>
     </div>
</body>
</html>