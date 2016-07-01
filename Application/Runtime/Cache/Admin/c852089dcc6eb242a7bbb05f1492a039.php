<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml" lang="zh-cn">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<head>  
	<title>欢迎使用高拍仪控件网页示例</title>
</head>
<body onload="init()">
     <div><object classid="clsid:88638732-1B2B-4BD8-AA32-8159092E9F51" id=LaCtrl CODEBASE="*.cab#version=0,0,0,0"  width=640 height=480> 
     </object>
	 <object classid="clsid:3C1939D8-D0D1-42E1-9FD0-B791F2A2BEC9" id=LaThumbCtrl CODEBASE="*.cab#version=0,0,0,0"  width=200 height=480> 
     </object></div>

	 
     <script   LANGUAGE=JavaScript event="AutoCapTrigger()" for=LaCtrl> 
		var val = num;
		var filename = FormatNum(val);
		var ext = "jpg";
		var obj=document.getElementById("curColor").options; 
		var x = obj.selectedIndex; 
		if(x == 2)
		{
			ext = "tif";
		}
		var path="e:\\Img"+filename +"."+ext;             //get_name()
		num++;
		LaCtrl.Capture(idx, path);
		LaThumbCtrl.AddItem(path);
     </script>
	 
	 <script   LANGUAGE=JavaScript event="TimerCapTrigger(index)" for=LaCtrl> 
		var val = num;
		var filename = FormatNum(val);
		var ext = "jpg";
		var obj=document.getElementById("curColor").options; 
		var x = obj.selectedIndex; 
		if(x == 2)
		{
			ext = "tif";
		}
		var path="D:\\Img"+filename +"."+ext;             //get_name()
		num++;
		LaCtrl.Capture(index, path);
		LaThumbCtrl.AddItem(path);
     </script>

     <script   LANGUAGE=JavaScript>   
        var idx=0;
        var str_houzui="jpg";
		function init()
		{
			deloptionDev();

			var count = LaCtrl.GetCameraCount();
			for(i = 0; i < count; i++)
			{
				var s = LaCtrl.GetDevName(i);
				addoptionDev(s);
			}
			document.getElementById("curDev").value = 0;
			
			initdevcolor();
			initCapMode();
		}
		
		
		function addoptionDev(s)   
		{
			var obj=document.getElementById("curDev").options; 
			var opt = new Option(s, obj.length ); 
			obj.options.add(opt);   
		}
		
		function deloptionDev()
		{   
			var obj=document.getElementById("curDev").options; 
			while (obj.length > 0)
			{
				obj.options.remove(obj.length - 1);   
			}   
		}
		
  　    function   start_preview()     
  　　  {   
  		   var num = LaCtrl.GetCameraCount();

		   LaCtrl.SetWelcomeStr(idx, "正在打开高拍仪, 请等待。。。")
		   LaCtrl.StartPreview(idx);
		   
		   enumres();
  　　  }   

  　　  function   stop_preview()     
  　　  {    
            LaCtrl.StopPreview(idx);
  　　  } 
  
		var num = 1;
		function FormatNum(Source){ 
			var strTemp=""; 
			var len = 5;
			if(Source < 10)
			{
				len = 4;
			}
			else if(Source < 100)
			{
				len = 3;
			}
			else if(Source < 1000)
			{
				len = 2;
			}
			for(i=0; i < len;i++)
			{ 
				strTemp += "0"; 
			} 
			return strTemp+Source; 
		} 
  
		
		function capture()
		{
			var val = num;
			var filename = FormatNum(val);
			var ext = "jpg";
			var obj=document.getElementById("curColor").options; 
			var x = obj.selectedIndex; 
			if(x == 2)
			{
				ext = "tif";
			}
			var path="D:\\Img"+filename +"."+ext;             //get_name()
			num++;
			LaCtrl.Capture(idx, path);
			LaThumbCtrl.AddItem(path);
			
			var text = "第"+(num-1)+"页";
			//alert(text);
			LaCtrl.PDFAddBase64(LaCtrl.CaptureAsBase64(idx), text);
			LaCtrl.PDFMakePDF("d:\\base64zp.pdf");
		}
		
		function capturebase64()
		{
			alert(LaCtrl.CaptureAsBase64(idx));
		}
		
		function RotateCrop(obj)
		{
			if(obj.checked)
			{
				var obj2 =document.getElementById("drawrect")
				if(obj2.checked)
				{
					obj2.checked = false;
					LaCtrl.SetMouseMode(idx, 0);
				}
			}

			LaCtrl.SetupAutoRotate(idx, obj.checked);
		}
		
		function setmousemode(obj)
		{
			if(obj.checked)
			{
				var obj2=document.getElementById("rotatecrop")
				if(obj2.checked)
				{
					obj2.checked = false;
					LaCtrl.SetupAutoRotate(idx, false);
				}
			}
			
			if(obj.checked)
			{
				LaCtrl.SetMouseMode(idx, 1);
			}
			else
			{
				LaCtrl.SetMouseMode(idx, 0);
			}
		}
		
		function rotleft()
		{
			LaCtrl.RotateLeft(idx);
		}
		
		function rotright()
		{
			LaCtrl.RotateRight(idx);
		}
		
		function setthumbnail()
		{
			LaThumbCtrl.SetThumbDirectiong(idx);
		}
		
		function changedev()
		{
			var obj=document.getElementById("selDev").options; 
			
			LaCtrl.SetVisible(idx, false);
			LaCtrl.StopPreview(idx);
			idx = obj.selectedIndex;    
			LaCtrl.StartPreview(idx);
			LaCtrl.SetVisible(idx, true);
			
			enumres();
		}
		
		function enumres()
		{
			deloptionRes();
			var iResIndex = 0;
			if(iResIndex != -1)
			{
				var count = LaCtrl.GetResCount(idx); 
				for(i = 0;i < count; i++)
				{
					var w = LaCtrl.GetResWidth(idx, i);
					var h = LaCtrl.GetResHeight(idx, i);
					var str = w.toString()+"x"+h.toString();
					addoptionRes(str);
				} 
				document.getElementById("curRes").value=iResIndex;
			}   
		}
		
		function deloptionRes()
		{   
			var obj=document.getElementById("curRes").options; 
			while (obj.length > 0)
			{
				obj.options.remove(obj.length - 1);   
			}   
		}
		function addoptionRes(s)   
		{
			var obj=document.getElementById("curRes").options; 
			var opt = new Option(s, obj.length ); 
			obj.options.add(opt);   
		}
		
		function initCapMode()
		{
			var obj=document.getElementById("capMode").options; 
			var opt = new Option("单张拍照", obj.length );
			obj.options.add(opt); 
			opt = new Option("合成拍照", obj.length );
			obj.options.add(opt); 
			document.getElementById("capMode").value=0;  
		}
		
		
		function initdevcolor()
		{
			deloptionClr();

			var obj=document.getElementById("curColor").options; 
			var opt = new Option("彩色", obj.length );
			obj.options.add(opt); 
			opt = new Option("灰度", obj.length );
			obj.options.add(opt); 
			opt = new Option("黑白", obj.length );
			obj.options.add(opt); 
			document.getElementById("curColor").value=0;  
		}
		
		function deloptionClr()
		{   
			var obj=document.getElementById("curColor").options; 
			while (obj.length > 0)
			{
				obj.options.remove(obj.length - 1);   
			}   
		}
		
		function showprop()
		{
			LaCtrl.ShowProperty(idx);
		}
		
		function readbarcode()
		{
			var res = LaCtrl.ReadBarcode(idx);
			alert(res);
		}
		
		function changeres()
		{
			var obj=document.getElementById("curRes").options; 
			var x = obj.selectedIndex; 
			LaCtrl.SetDevRes(idx, x);
		}
		
		function changeclr()
		{
			var obj=document.getElementById("curColor").options; 
			var x = obj.selectedIndex; 
			LaCtrl.SetDevColor(idx, x);
		}
		
		function changemode()
		{
			var obj=document.getElementById("capMode").options; 
			var x = obj.selectedIndex; 
			LaCtrl.SetCaptureMode(idx, x);
		}
		
		function makepdf()
		{
			LaThumbCtrl.MakePDF("d:\\123456.pdf");
			alert("d:\\123456.pdf\nPDF文件已生成！")
		}
		
		function startrecord()
		{
			var obj=document.getElementById("recvideo");
			if(obj.value == "开始录像")
			{
				var myDate = new Date();
				var filepath = "d:\\video\\"+myDate.getFullYear()+"-"+(myDate.getMonth()+1)+"-"+myDate.getDate()+"_"+myDate.getHours()+
				                         myDate.getMinutes() + myDate.getSeconds() + ".wmv";
				alert("开始录像, 录像文件路径为:\r\n"+filepath+"\r\n请注意第三个参数表示是否录音, 0--不录音, 1--录音");
				LaCtrl.StartRecord(idx, filepath, 1);
				obj.value = "停止录像";
			}
		    else if(obj.value == "停止录像")
			{
				LaCtrl.StopRecord(idx);
				obj.value = "开始录像";
			}
		}
		
		function stoprecord()
		{
			LaCtrl.StopRecord(idx);
		}
		
		function resetvideo()
		{
			LaCtrl.ResetVideoShow(idx);
		}
		
		function makepdfasbase64()
		{
			var count = LaThumbCtrl.GetItemCount();
			for(var i = 0; i < count; i++)
			{
				LaCtrl.PDFAddImage(LaThumbCtrl.GetItemFilePath(i));
			}
			alert(LaCtrl.MakePDFAsBase64());
		}
		
		function startautocap()
		{
			var obj=document.getElementById("autocap");
			if(obj.value == "开始智能连拍")
			{
				alert("开始智能连拍, 智能连拍会自动检测变化进行拍照, 不变化则不拍照");
				LaCtrl.StartAutoCap(idx);
				obj.value = "停止智能连拍";
			}
		    else if(obj.value == "停止智能连拍")
			{
				LaCtrl.StopAutoCap(idx);
				obj.value = "开始智能连拍";
			}
		}
		
		function starttmcap()
		{
			var obj=document.getElementById("tmcap");
			if(obj.value == "开始定时连拍")
			{
				alert("开始定时连拍, 定时连拍会根据设定的时间间隔进行拍照, 当前时间间隔为6秒, 如要更改, 请改动网页代码！")
				LaCtrl.StartTimerCap(idx, 6);
				obj.value = "停止定时连拍";
			}
		    else if(obj.value == "停止定时连拍")
			{
				LaCtrl.StopTimerCap(idx);
				obj.value = "开始定时连拍";
			}
		}
		
		function readidcard()
		{
			var idcardinfo;
			if(LaCtrl.ReadIDCard())
			{
				idcardinfo = LaCtrl.GetIDName() + "  \r\n" + LaCtrl.GetIDSex() + "    " + LaCtrl.GetIDNation() + "\r\n" +
				             LaCtrl.GetIDBirthYear() + "-" + LaCtrl.GetIDBirthMonth() + "-" + LaCtrl.GetIDBirthDay() + "\r\n" +
							 LaCtrl.GetIDAddress() + "\r\n" + LaCtrl.GetIDNum() + "\r\n" + LaCtrl.GetIDDepart() + "\r\n" + LaCtrl.GetIDTermDay();
				alert(idcardinfo);
				LaThumbCtrl.AddItem(LaCtrl.GetIDHeadImagePath());
				LaThumbCtrl.AddItem(LaCtrl.MakeIDCardImage());
			}
			else 
			{
				alert("请确认设备已连接, 身份证已放好, 如果身份证已在读卡器上请拿开重放！");
			}
			
		}
		
		function getAuthCode()
		{
			alert(LaCtrl.GetAuthCode());
		}
		
		function showSelect()
		{
			var count = LaThumbCtrl.GetItemCount();
			var res;
			res = "您选中了第";
			for(i = 0; i < count; i++)
			{
			    if(LaThumbCtrl.IsChecked(i))
				{
					res += "" +(i+1) + ",";
				}
			}
			res += " 项";
			alert(res);
		}
		
		
		function getExposure()
		{
			var text;
			if(LaCtrl.IsAutoExposure(idx))
			{
				text = "曝光状态: 自动\r\n";
			}
			else
			{
				text = "曝光状态: 手动\r\n";
			}
			
			text += "曝光度取值范围:(" + LaCtrl.GetExposureMin(idx) + " - " + LaCtrl.GetExposureMax(idx) + ")\r\n";
			text += "曝光度当前值: " + LaCtrl.GetExposureVal(idx);
			alert(text);
		}
		
		function setExposure()
		{
			LaCtrl.SetExposure(idx, false, -5);
		}
     </script> 





</br>
<tr>
	<td>
	当前设备：<select id="curDev" style="width: 90px" name="selDev"
										onchange="changedev()"></select>
	当前分辨率：<select id="curRes" style="width: 90px" name="curRes"
										onchange="changeres()"></select>
	颜色：<select id="curColor" style="width: 90px" name="curRes"
										onchange="changeclr()"></select>
	拍照模式：<select id="capMode" style="width: 90px" name="curRes"
										onchange="changemode()"></select>
	<input id="rotatecrop" type="checkbox" value="" onclick="RotateCrop(this)" />纠偏裁边
	<input id="drawrect" type="checkbox" value="" onclick="setmousemode(this)" />框选
	<br><br>
     <input   TYPE="button"   VALUE="开始预览"   onClick="start_preview()"> 
     <input   TYPE="button"   VALUE="停止预览"   onClick="stop_preview()"> 
     <input   TYPE="button"   VALUE="拍照"   onClick="capture()"> 
	 <input   TYPE="button"   VALUE="拍照为Base64"   onClick="capturebase64()"> 
	 <input   TYPE="button"   VALUE="左转"   onClick="rotleft()"> 
	 <input   TYPE="button"   VALUE="右转"   onClick="rotright()"> 
	 <input   TYPE="button"   VALUE="视频属性"   onClick="showprop()">
	 <input   TYPE="button"   VALUE="条码识别"   onClick="readbarcode()">
	 <input   TYPE="button"   VALUE="生成PDF"   onClick="makepdf()">
	 <input   TYPE="button"   id=recvideo VALUE="开始录像"   onClick="startrecord()">
	 <input   TYPE="button"   VALUE="画面恢复"   onClick="resetvideo()">
	 <input   TYPE="button"   VALUE="MakePDFAsBase64"   onClick="makepdfasbase64()"><br><br>
	 <input   TYPE="button"   id=autocap VALUE="开始智能连拍"   onClick="startautocap()">
	 <input   TYPE="button"   id=tmcap VALUE="开始定时连拍"   onClick="starttmcap()">
	 <input   TYPE="button"   VALUE="读取身份证"   onClick="readidcard()">
	 <input   TYPE="button"   VALUE="获取授权码"   onClick="getAuthCode()">
	 <input   TYPE="button"   VALUE="缩略图选择演示"   onClick="showSelect()">
	 <input   TYPE="button"   VALUE="获取曝光度信息"   onClick="getExposure()">
	 <input   TYPE="button"   VALUE="设置曝光度"   onClick="setExposure()">
	 </td>
</tr>
</body>
  
</html>