<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/js/combo/dhtmlxcombo.css"/>
		<script src="/grid_chi/Public/js/combo/dhtmlxcombo.js"></script>
		<!-- <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script> -->
		<script type="text/javascript" src="/grid_chi/Public/layer/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/kindeditor/kindeditor-min.js"></script>
        <script type="text/javascript" src="/grid_chi/Public/js/kindeditor/lang/zh_CN.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/ajaxfileupload.js"></script>

		<script type="text/javascript" src="/grid_chi/Public/layer/layer.js"></script>

		<!-- <script src="http://res.layui.com/lay/lib/layer/src/layer.js?v=2.1"></script> -->

		<script type="text/javascript">
			var kindEditor;
			$(document).ready(function() {

				kindEditor = KindEditor.create('#content', {
					themeType : 'simple',
					allowPreviewEmoticons : false,
					allowFileManager : false,
					allowImageUpload : true,
					uploadJson : '/grid_chi/index.php/Home/File/mangeUpload',
					urlType : 'absolute',
					items : ['source', 'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', 'strikethrough', 'lineheight', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|', 'emoticons', 'image', 'table', 'hr', 'link', '|', 'wordpaste', 'quickformat', 'fullscreen']
				});

			});

			//提交表单
			function saveForm() {
				kindEditor.sync();
				var checked = checkForm('#form1');
				if (checked == false) {
					return;
				}
				//$('#flag').attr('value', '已保存');
			
				$('#form1').submit();
			}

			//===================================附件上传===========================================

			function doUpload(obj) {
				$.ajaxFileUpload({
					url : '/grid_chi/index.php/Home/File/upload', //用于文件上传的服务器端请求地址
					type : 'post',
					data : {
						fileId : 'file_attachment',
						name : 'lunis'
					}, //此参数非常严谨，写错一个引号都不行
					secureuri : false, //一般设置为false
					fileElementId : 'file_attachment', //文件上传空间的id属性  <input type="file" id="file1" name="file1" />
					dataType : 'text', //返回值类型 一般设置为json
					success : function(data, status)//服务器成功响应处理函数
					{
						var name = data.name;
						var url = data.url;
						var href = url;

                        //alert(name+";"+url);

						var div = $('#div_attachment');
						var html = '<div>' + '<input type="hidden" name="attachment[]" value="' + name + '">' + '<input type="hidden" name="attachmenturl[]" value="' + url + '">' + '<a href="' + href + '" target="_blank">' + name + '</a><a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png"></a>' + '</div>';
						div.append(html);
					},
					error : function(data, status, e)//服务器响应失败处理函数
					{
						alert(e);
					}
				});
			}

			/**
			 *移除父对象
			 */
			function removeParent(obj) {
				$(obj).parent().remove();
			}

		</script>
	</head>

	<body>

		<div class="content">
			<ul class="breadcrumb">
				<li>
					<a href="/grid_chi/index.php/Admin/Index/main.html">首页</a><span class="divider">/</span>
				</li>
				<li>
					<a href="/grid_chi/index.php/Admin/Project/ztProjectMain">通知公告</a><span class="divider">/</span>
				</li>
				<li class="active">
					添加项目
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">
					<div class="btn-toolbar">
						<button class="btn btn-primary" onclick="saveForm()">
							<img src="/grid_chi/Public/images/icon/clipboard.png" class="clipboard"/> 保存
						</button>
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div>

					<div class="well you-bg">
						<form id="form1" action="<?php echo ($mo==null?'/grid_chi/index.php/Admin/News/insert':'/grid_chi/index.php/Admin/News/update'); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>" />

							<table class="youAdd">

								<tr>
									<td class="TDleft">标题：</td>
									<td colspan="3">
									<input type="text" size="80" id="title" name="title" value="<?php echo ($mo["title"]); ?>" />
									</td>
								</tr>
								<tr>
									<td class="TDleft">描述：</td>
									<td colspan="3">							
							           <textarea class="input-xxlarge" id="description" name="description"><?php echo ($mo["description"]); ?></textarea>
							        </td>
								</tr>

								<tr>
									<td class="TDleft">来源：</td>
									<td >
									<input type="text" id="source" name="source" value="<?php echo ((isset($mo["source"]) && ($mo["source"] !== ""))?($mo["source"]):'黄石市招商局'); ?>" />
									</td>
									<td class="TDleft">时间：</td>
									<td >
									<input type="text" id="indate" name="intime" value="<?php echo ((isset($mo["intime"]) && ($mo["intime"] !== ""))?($mo["intime"]):$nowtime); ?>" class="Wdate"  onclick="WdatePicker()" />
									</td>
								</tr>
								<tr>
									<td class="TDleft">内容：</td>
									<td colspan="3">									<textarea id="content" name="content" style="width: 100%; height:300px;visibility: hidden;"><?php echo ($mo["content"]); ?></textarea></td>
								</tr>
								<tr>
									<td class="TDleft">附件：</td>
									<td colspan="3">
									<div id="div_attachment">

										<!-- 如果有附件就显示 -->
										<?php if(!empty($mo["attachmenturl"])): if(is_array($attachmenturlArr)): foreach($attachmenturlArr as $k=>$vo): ?><div>
													<a href="<?php echo ($vo); ?>" target="_blank"><?php echo ($attachmentArr[$k]); ?></a>
													<input type="hidden" id="attachment" name="attachment[]" value="<?php echo ($attachmentArr[$k]); ?>"  />
													<input type="hidden" id="attachmenturl" name="attachmenturl[]" value="<?php echo ($vo); ?>" />
													<a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>
												</div><?php endforeach; endif; endif; ?>

									</div>
									<input type="file" id="file_attachment" name="file_attachment" onchange="doUpload(this)" />
									</td>
								</tr>

							</table>
						</form>

					</div>

				</div>
			</div>
		</div>

	</body>

</html>