<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>黄石市招商局信息报送系统</title>
		<style>
			body {
				font-family: Microsoft YaHei, '微软雅黑', Tahoma, Helvetica, Arial, sans-serif;
			}
			*, * focus {
				outline: none;
				margin: 0;
				padding: 0;
			}
			#login_bg {
				width: 100%;
				height: 100%;
				position: fixed;
				left: 0;
				top: 0;
				bottom: 0;
				right: 0;
				z-index: -1;
			}
			.logo {
				margin: 12% 0 40px 0;
				text-align: center;
				color: #D6F4FF;
				font-size: 25px;
			}
			.main {
				width: 340px;
				margin: 0 auto;
				text-align: center;
				overflow: hidden;
			}
			.main-left {
				overflow: hidden;
			}
			input {
				vertical-align: middle;
			}
			.input {
				width: 338px;
				height: 44px;
				background-color: #FFF;
				-border-radius: 3px;
				-moz-border-radius: 3px;
				-webkit-border-radius: 3px;
				margin-bottom: 15px;
				overflow: hidden;
				text-align: center;
				border: 1px solid #000;
				box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
			}
			.input input {
				width: 285px;
				height: 42px;
				line-height: 42px;
				font-size: 16px;
				font-weight: bold;
				vertical-align: middle;
				float: left;
				border: 0;
				text-indent: 1em;
				color: #ABADB3;
				background-color: #FFF;
			}
			.username em {
				background: url(/grid_chi/Public/images/login/username.gif) no-repeat center #AFE8F4;
			}
			.password em {
				background: url(/grid_chi/Public/images/login/password.gif) no-repeat center #8FDFF0;
			}
			.input em {
				width: 49px;
				height: 44px;
				float: left;
			}
			.adminImg {
				background-color: #EFEFEF;
				width: 80px;
				height: 80px;
				border: 1px solid #FFF;
				-border-radius: 100px;
				-moz-border-radius: 100px;
				-webkit-border-radius: 100px;
				overflow: hidden;
				margin: 0 auto;
				box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
			}
			.adminImg img {
				width: 80px;
				height: 80px;
			}
			.mfoot {
				padding: 0 10px 10px 10px;
				overflow: hidden;
				color: #FFF;
				font-size: 12px;
			}
			.mfoot a {
				color: #FFF;
				text-decoration: none;
				font-size: 12px;
			}
			.btn-danger {
				display: inline-block;
				height: 42px;
				width: 200px;
				margin-top: 8px;
				background-color: #d9534f;
				color: #FFF;
				font-size: 16px;
				font-weight: bold;
				border: 1px solid #000;
				box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
				-border-radius: 3px;
				-moz-border-radius: 3px;
				-webkit-border-radius: 3px;
			}
			.btn-danger:hover, .btn-danger:focus {
				background-color: #d2322d;
			}
			#bottom {
				position: absolute;
				left: 0;
				bottom: 10px;
				z-index: 1;
				width: 100%;
				height: 20px;
				text-align: center;
				font-size: 13px;
				line-height: 20px;
				color: #86B5EE;
			}/*底部版权样式*/
		</style>
		<script type="text/javascript" src="/grid_chi/Public/layer/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/layer/layer.js"></script>
		<script type="text/javascript">
			$(function() {

				// if (myBrowser() == "IE6" || myBrowser() == "IE7") {
// 
					// layer.open({
						// title : '提示',
						// type : 1,
						// area : ['300px', '360px'],
						// shadeClose : true, //点击遮罩关闭
						// content : '\<\div style="padding:20px;">您使用的浏览器并不能保证完全兼容本系统，请使用IE8以上浏览器访问。<br><br><br><br><br><br><br><br><br>如有问题请联系系统管理员，谢谢！\<\/div>'
					// });
				// }

			});

			function myBrowser() {
				var userAgent = navigator.userAgent;
				//取得浏览器的userAgent字符串
				var isOpera = userAgent.indexOf("Opera") > -1;
				//判断是否Opera浏览器
				var isIE = userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera;
				//判断是否IE浏览器
				var isFF = userAgent.indexOf("Firefox") > -1;
				//判断是否Firefox浏览器
				var isSafari = userAgent.indexOf("Safari") > -1;
				//判断是否Safari浏览器
				if (isIE) {
					var IE5 = IE55 = IE6 = IE7 = IE8 = false;
					var reIE = new RegExp("MSIE (\\d+\\.\\d+);");
					reIE.test(userAgent);
					var fIEVersion = parseFloat(RegExp["$1"]);
					IE55 = fIEVersion == 5.5;
					IE6 = fIEVersion == 6.0;
					IE7 = fIEVersion == 7.0;
					IE8 = fIEVersion == 8.0;
					if (IE55) {
						return "IE55";
					}
					if (IE6) {
						return "IE6";
					}
					if (IE7) {
						return "IE7";
					}
					if (IE8) {
						return "IE8";
					}
				}//isIE end
				if (isFF) {
					return "FF";
				}
				if (isOpera) {
					return "Opera";
				}
			}//myBrowser() end

		</script>

	</head>
	<body><img src="/grid_chi/Public/images/login/login_bg.jpg" id="login_bg"/>
		<div class="logo"><img src="/grid_chi/Public/images/frame/logo.png"/>
		</div>
		<div class="main">
			<form action="/grid_chi/index.php/Admin/Login/login" method="post">
				<div class="input username">
					<em></em>
					<input name="username" id="textfield" value=""/>
				</div>
				<div class="input password">
					<em></em>
					<input name="password" id="textfield" type="password" value="" />
				</div>
				<div class="mfoot">
					<!-- <div style="float:left;">
					<input id="mdl" name="checkbox" type="checkbox" value="checkbox">
					<label for="mdl">一周内免登陆</label>
					</div>
					<a href="#" style="float:right;">忘记登录密码？</a> -->
				</div>
				<div class="mbut">
					<input name="" type="submit" value="登 录" class="btn-danger">
				</div>
			</form>
		</div>
		<div id="bottom">
			copyright by gridsoft co.,ltd 2015-2016 www.gridssoft.com
		</div>
	</body>
</html>