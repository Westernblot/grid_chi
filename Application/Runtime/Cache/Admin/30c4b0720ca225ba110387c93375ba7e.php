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

	</head>

	<body>

		<div class="content">
			<ul class="breadcrumb">
				<li>
					<a href="/grid_chi/index.php/Admin/Index/main.html">首页</a><span class="divider">/</span>
				</li>
				
				<li class="active">
					查看
				</li>
			</ul>

			<div class="container-fluid">
				<a href="javascript:history.back();" class="btn">返回</a>
<div class="show">
    <div class="show-title">
        <h2><?php echo ($mo["title"]); ?></h2>
        来源：<?php echo ($mo["source"]); ?> 　发布时间：<?php echo ($mo["intime"]); ?>
     </div>
    <div class="show-description"><?php echo ($mo["description"]); ?></div>
    　<div class="show-main"><?php echo ($mo["content"]); ?> </div>
    									<!-- 如果有附件就显示 -->
										<?php if(!empty($mo["attachmenturl"])): if(is_array($attachmenturlArr)): foreach($attachmenturlArr as $k=>$vo): ?><div class="show-file">
													<a href="<?php echo ($vo); ?>" target="_blank"><?php echo ($attachmentArr[$k]); ?></a>
													<input type="hidden" id="attachment" name="attachment[]" value="<?php echo ($attachmentArr[$k]); ?>"  />
													<input type="hidden" id="attachmenturl" name="attachmenturl[]" value="<?php echo ($vo); ?>" />
													
												</div><?php endforeach; endif; endif; ?>
</div>
				
				

				</div>
			</div>
		</div>

	</body>

</html>