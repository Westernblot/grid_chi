<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="/grid_lyj/Public/css/default.css" rel="stylesheet" type="text/css" />
<link href="/grid_lyj/Public/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_lyj/Public/js/goaler.js"></script>
<!-- <script type="text/javascript" src="/grid_lyj/Public/js/jquery.js"></script> -->
<script type="text/javascript" src="/grid_lyj/Public/js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/kindeditor/lang/zh_CN.js"></script>
<!-- ajaxFileUpload 的最高jquery版本为1.4.2。后续高级版本将不能实现提交 -->
<script type="text/javascript" src="/grid_lyj/Public/js/ajaxfileupload.js"></script>
<script type="text/javascript">

var kindEditor;
$(document).ready(function(){
	
	kindEditor = KindEditor.create('#content', {
		themeType : 'simple',
		allowPreviewEmoticons : false,
		allowFileManager : false,
		allowImageUpload : true,
		uploadJson : '/grid_lyj/index.php/Admin/Zxft/mangeUpload',
		//urlType: 'relative',
		items : [
			'source', 'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			'removeformat', 'strikethrough', 'lineheight', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', '|', 'emoticons', 'image', 'table', 'hr', 'link', '|', 'wordpaste', 'quickformat', 'fullscreen']
	});
	
});

//===========================图片上传===================================
function doImg(obj){
	
	 $.ajaxFileUpload
     (
         {
             url: '/grid_lyj/index.php/Admin/Zxft/upload', //用于文件上传的服务器端请求地址
             type: 'post',
             data: { fileId: 'file1', name: 'lunis' }, //此参数非常严谨，写错一个引号都不行
             secureuri: false, //一般设置为false
             fileElementId: 'file1', //文件上传空间的id属性  <input type="file" id="file1" name="file1" />
             dataType: 'text', //返回值类型 一般设置为json
             success: function (data, status)  //服务器成功响应处理函数
             {
                var name=data.name;
                var url=data.url;
                
            	$('#imgId').attr('src',url);
	            $('#img').attr('value',name);
	            $('#imgurl').attr('value',url);
             },
             error: function (data, status, e)//服务器响应失败处理函数
             {
                 alert(e);
             }
         }
     );
    // $('#form1').attr('action','/grid_lyj/index.php/Admin/Zxft/upload');
    // $('#form1').submit();
}

//删除附件
function delDiv(obj){
	$(obj).parent().find('#imgId').attr('src','');
	$(obj).parent().find('#img').attr('value','');
	$(obj).parent().find('#imgurl').attr('value','');
}


//保存数据
function sub(){
	kindEditor.sync();
	$('#form1').submit();
}

</script>
</head>
<body style="overflow: auto;">
<div id="div_right">
	<div class="right_top">
					<span>在线访谈</span>
				</div>
				<div class="title">
					<a href="javascript:sub()"  class="btn btn-green">保存</a> 
					<a href="javascript:history.back();" class="btn btn-default"  >返回</a>
				</div>
				
		<div class="develop">
		<form action="<?php echo ($zxft==null?'/grid_lyj/index.php/Admin/Zxft/insert':'/grid_lyj/index.php/Admin/Zxft/update'); ?>"  id="form1" method="post">
		   
		   <input type="hidden" name="id" value="<?php echo ($zxft["id"]); ?>" />
		   <table width="100%" border="0" class="mtable" >
		    <tr>
		    	<td align="right">封面</td>
		    	<td colspan="3">
		    		<div>
		    		<input type="file" id="file1" name="file1" onchange="doImg(this)" />
		    		<img id="imgId" alt="" src="<?php echo ($zxft["imgurl"]); ?>" style="width: 160px;height: 90px" >
		    		 <a href="javascript:#" id="del" onclick="delDiv(this)"><img src="/grid_lyj/Public/images/remove.png" /></a>
		    		<br><input type="hidden" size="80" id="img" name="img" value="<?php echo ($zxft["img"]); ?>" />
		    		<br><input type="hidden" size="80" id="imgurl" name="imgurl" value="<?php echo ($zxft["imgurl"]); ?>" />
		            </div>
		    	</td>
		    </tr>
		    <tr>
		    	<td align="right">主题</td>
		    	<td colspan="3"><input type="text" size="80" id="subject" name="subject" value="<?php echo ($zxft["subject"]); ?>" /></td>
		    </tr>
		    <tr>
		    	<td align="right" width="20%">来源</td>
		    	<td width="30%"><input type="text" id="source" name="source" value="<?php echo ((isset($zxft["source"]) && ($zxft["source"] !== ""))?($zxft["source"]):'黄石市林业局'); ?>" /></td>
		    	<td align="right" width="20%">时间</td>
		    	<td width="30%"><input type="text" id="indate" name="indate" value="<?php echo ((isset($zxft["indate"]) && ($zxft["indate"] !== ""))?($zxft["indate"]):$nowdate); ?>" class="Wdate"  onclick="WdatePicker()" /></td>
		    </tr>
		    <tr>
		    	<td align="right">描述</td>
		    	<td colspan="3">
                    <textarea id="description" name="description"><?php echo ($zxft["description"]); ?></textarea>
                </td>
		    </tr>
		    <tr>
		    	<td align="right">标题</td>
		    	<td colspan="3">
		    		<input type="text" size="80" id="title" name="title" value="<?php echo ($zxft["title"]); ?>" />
		    	</td>
		    </tr>
		    <tr>
		    	<td align="right">内容</td>
		    	<td colspan="3">
		    		  <textarea id="content" name="content" style="width: 100%; height:300px;visibility: hidden;"><?php echo ($zxft["content"]); ?></textarea>
		    	</td>
		    </tr>
		    
		   </table> 
		</form>
		</div>
		
</div>
</body>
</html>