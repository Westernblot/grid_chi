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
	<script src="/grid_chi/Public/validate/jquery.js"></script>
    <script src="/grid_chi/Public/validate/jquery.validate.min.js"></script>
    <script src="/grid_chi/Public/validate/localization/messages_zh.js"></script>
    <script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
    <script type="text/javascript" src="/grid_chi/Public/js/ajaxfileupload.js"></script>
  
    
    <script type="text/javascript" src="/grid_chi/Public/layer/layer.js"></script>
    
    <!-- <script src="http://res.layui.com/lay/lib/layer/src/layer.js?v=2.1"></script> -->

	<script type="text/javascript">
	    $().ready(function() {
            $("#form1").validate();
        });
	    //弹出操作窗口
	    function popLayer(){
	    	
	    //页面层
    layer.open({
        type: 2,
        title: '从高拍仪拍照',
        maxmin: true,
        //shade:0,
        shadeClose: true, //点击遮罩关闭层
        area : ['800px' , '520px'],
        content: '/grid_chi/index.php/Admin/Gpy/show.html',
         btn: ['确定'],
         yes: function(index, layero){
             //do something
             //alert(layer.getChildFrame('#div_gpy_attachment', index).text());
             
              var gpyArr = layer.getChildFrame('#div_gpy_attachment', index).text().split(";");
             
              var div = $('#div_gpy_attachment');
              for(var i=0;i<gpyArr.length;i++){
              	var name = gpyArr[i];
              	if(name!=''){             		
				var html = '<div>'
						    +'<a href="/grid_chi/Uploads/gpy/'+name+'" target="_blank">'+name+'</a>'
		                    +'<input type="hidden" id="gpy" name="gpy[]" value="'+name+'" />'
		                    +'<a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>'
							+'</div>';
				div.append(html);
              	}
              }
             
             
             
          layer.close(index); //如果设定了yes回调，需进行手工关闭
         }
    });
	    
	    }
	    
	    //提交审核
			function submitAudit() {
				// var checked = checkForm('#form1');
				// if (checked == false) {
					// return;
				// }
				$('#flag').attr('value','审核中');
				$('#form1').submit();
			}
	    
	   //提交表单
		function saveForm() {
			// var checked = checkForm('#form1');
			// if (checked == false) {
				// return;
			// }
			$("#form1").validate();
			$('#flag').attr('value','已保存');
			$('#form1').submit();
		}
		
		
		//===================================附件上传===========================================

function doUpload(){
	 $.ajaxFileUpload
     (
         {
             url: '/grid_chi/index.php/Home/File/upload', //用于文件上传的服务器端请求地址
             type: 'post',
             data: { fileId: 'file_attachment', name: 'lunis' }, //此参数非常严谨，写错一个引号都不行
             secureuri: false, //一般设置为false
             fileElementId: 'file_attachment', //文件上传空间的id属性  <input type="file" id="file1" name="file1" />
             dataType: 'text', //返回值类型 一般设置为json
             success: function (data, status)  //服务器成功响应处理函数
             {
                var name=data.name;
                var url=data.url;
                var href = url;
                
                
               // alert(name+";"+url);
                
                var div = $('#div_attachment');
				var html = '<div>'
						    +'<input type="hidden" name="attachment[]" value="'+name+'">'
							+'<input type="hidden" name="attachment_url[]" value="'+url+'">'
							+'<a href="'+href+'" target="_blank">'+name+'</a><a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png"></a>'
							+'</div>';
				div.append(html);
             },
             error: function (data, status, e)//服务器响应失败处理函数
             {
                 alert(e);
             }
         }
     );
}

         /**
          *移除父对象 
          */
         function removeParent(obj){
         	$(obj).parent().remove();
         }
		
		
		
		//==============================分割线==========================================
		
		function addItem(obj){
			var html='<tr>'
					  +'<td><input type="text" name="visit_company[]" value="" class="input-large" required="required"></td>'
						+'<td><input type="text" name="vister_man[]" value="" class="input-large" required="required"></td>'
						+'<td><input type="text" name="vister_man_position[]" value="" class="input-large" required="required"></td>'
					   +' <td>'
						+'	<a href="javascript:#" onclick="addItem(this)">添加一行</a>'
						+'	<a href="javascript:#" onclick="removeItem(this)">删除一行</a>'
						+'</td>'
					 +' </tr>';
		     $(obj).parent().parent().after(html);
		}
		
		function removeItem(obj){
			$(obj).parent().parent().remove();
		}
		
		
		
		
		//测试
		function test(){
			layer.open({
  type: 2,
   maxmin: true,
  area : ['800px' , '520px'],
  content: 'http://xyjg.egs.gov.cn/ECPS_HB/search.jspx',
  success: function(layero, index){
    
    alert("ee");
    var body = layer.getChildFrame('body', index);
    
    alert('cc='+body);
    body.find('#entName').attr('value','cccc');
    
    
  }
});       
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
					<a href="/grid_chi/index.php/Admin/Project/ztProjectMain">驻外招商一览表</a><span class="divider">/</span>
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
						<a href="javascript:submitAudit()" class="btn">提交审核</a>
						<!-- <a href="javascript:test()" class="btn">test</a> -->
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div>
					
					<div class="well you-bg">
						<form id="form1" action="<?php echo ($mo==null?'/grid_chi/index.php/Admin/Outside/insert':'/grid_chi/index.php/Admin/Outside/update'); ?>?toPage=<?php echo ($toPage); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>" />
							<input type="hidden" id="flag" name="flag" value="" />

							<table class="youAdd">
								
								<tr>
									<td class="TDleft"><label>姓名：<font color="red">*</font></label></td>
									<td>
									<input type="text" name="name" value="<?php echo ($mo["name"]); ?>" class="input-large" required="required">
									</td>
									<td class="TDleft"><label>部门：<font color="red">*</font></label></td>
									<td>
									<input type="text" name="dept" value="<?php echo ((isset($mo["dept"]) && ($mo["dept"] !== ""))?($mo["dept"]):$_SESSION['user']['dept']); ?>" class="input-large" required="required">
									</td>
								</tr>
								<tr>
									<td class="TDleft"><label>招商领导类型：<font color="red">*</font></label></td>
									<td>
									<!-- <input type="text" name="leader_type" value="<?php echo ((isset($mo["name"]) && ($mo["name"] !== ""))?($mo["name"]):$_SESSION['user']['cnname']); ?>" class="input-large"> -->
									<select name="leader_type" required="required">
										<option value="" <?php if(($mo["leader_type"]) == ""): ?>selected<?php endif; ?> >-请选择-</option>
										<option value="党政主职" <?php if(($mo["leader_type"]) == "党政主职"): ?>selected<?php endif; ?> >党政主职</option>
										<option value="分局局长" <?php if(($mo["leader_type"]) == "分局局长"): ?>selected<?php endif; ?> >分局局长</option>
										<option value="其他"  <?php if(($mo["leader_type"]) == "其他"): ?>selected<?php endif; ?> >其他</option>
									</select>
									
									</td>
									<td class="TDleft"><label>到达目的地：<font color="red">*</font></label></td>
									<td>
									<input type="text" name="dest" value="<?php echo ($mo["dest"]); ?>" class="input-large" required="required">
									</td>
								</tr>
								<tr>
									<td class="TDleft"><label>开始时间：<font color="red">*</font></label></td>
									<td>
									<input type="text" name="sdate" value="<?php echo ($mo["sdate"]); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMMdd'})" required="required">
									</td>
									<td class="TDleft"><label>结束时间：<font color="red">*</font></label></td>
									<td>
									<input type="text" name="edate" value="<?php echo ($mo["edate"]); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMMdd'})" required="required">
									</td>
									
								</tr>
								<tr>
									<td class="TDleft"><label>出访天数（天）：<font color="red">*</font></label></td>
									<td>
									<input type="number" name="num" value="<?php echo ($mo["num"]); ?>" class="input-large" required="required">
									</td>
									
									<td class="TDleft"><label>所属产业链：<font color="red">*</font></label></td>
		<td>
		<select id="industry_chain" name="industry_chain" required="required">
			   <option value="" <?php if(($mo["industry_chain"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "所属产业链"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["industry_chain"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		
		</td>
								</tr>
								<tr>
									<!-- <td class="TDleft"><label>拜访企业名称：</label></td>
									<td>
									<input type="text" name="visit_company" value="<?php echo ($mo["visit_company"]); ?>" class="input-large">
									</td>
									<td class="TDleft"><label>接洽人姓名：</label></td>
									<td>
									<input type="text" name="vister_man" value="<?php echo ($mo["vister_man"]); ?>" class="input-large">
									</td>
									<td class="TDleft"><label>接洽人职务：</label></td>
									<td colspan="3">
									<input type="text" name="vister_man_position" value="<?php echo ($mo["vister_man_position"]); ?>" class="input-large">
									</td> -->
								    
								   
								    
								</tr>
								<tr>
									<td class="TDleft"><label>备注：</label></td>
									<td colspan="3">
									 <textarea class="input-xxlarge" name="remark"><?php echo ($mo["remark"]); ?></textarea>
									</td>
								</tr>
      <tr>
		    	<td class="TDleft">附件：</td>
		    	<td colspan="3">
		    		  
		    	
		    		  
<div id="div_attachment">
					
		 <!-- 如果有附件就显示 -->	     
	<?php if(!empty($mo["attachment_url"])): if(is_array($attachment_urlArr)): foreach($attachment_urlArr as $k=>$vo): ?><div>	      
		       <a href="<?php echo ($vo); ?>" target="_blank"><?php echo ($attachmentArr[$k]); ?></a>
		       <input type="hidden" id="attachment" name="attachment[]" value="<?php echo ($attachmentArr[$k]); ?>"  />
		       <input type="hidden" id="attachment_url" name="attachment_url[]" value="<?php echo ($vo); ?>" />
		       <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>
		     </div><?php endforeach; endif; endif; ?>
		    		  
</div>  		  
		    		<input type="file" id="file_attachment" name="file_attachment" onchange="doUpload(this)" />
		    	</td>
		    </tr>
		    
		    <tr>
		    	<td class="TDleft">高拍仪：</td>
		    	<td colspan="3">
		    		<div id="div_gpy_attachment">
	
	<?php if(!empty($mo["gpy"])): if(is_array($gpyArr)): foreach($gpyArr as $k=>$vo): ?><div>	      
		       <a href="/grid_chi/Uploads/gpy/<?php echo ($vo); ?>" target="_blank"><?php echo ($vo); ?></a>
		       <input type="hidden" id="gpy" name="gpy[]" value="<?php echo ($vo); ?>" />
		       <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>
		     </div><?php endforeach; endif; endif; ?>	
		
		    		</div>
		    		<input type="button" name="" value="从高拍仪拍照" onclick="popLayer()" />
		    		
		    	</td>
		    </tr>
		    
							</table>
							
							<fieldset>
								<legend>
									拜访信息
								</legend>
							    <table class="youAdd">
								    	
								    	<tr>
								    	   <th >拜访企业<font color="red">*</font></th>
								    	    <th>接洽人姓名<font color="red">*</font></th>
								    	     <th>接洽人职务<font color="red">*</font></th>
								    	      <th>操作</th>
								    	</tr>
								    	  
								  <?php if(empty($mo)): ?><tr>
								    	   <td><input type="text" name="visit_company[]" value="" class="input-large" required="required"></td>
								    	    <td><input type="text" name="vister_man[]" value="" class="input-large" required="required"></td>
								    	     <td><input type="text" name="vister_man_position[]" value="" class="input-large" required="required"></td>
								    	    <td>
								    	    	<a href="javascript:#" onclick="addItem(this)">添加一行</a>
								    	    	<a href="javascript:#" onclick="removeItem(this)">删除一行</a>
								    	    </td>
								    	</tr>
								    	    
								    	    <?php else: ?> 
		<?php if(!empty($mo["visit_company"])): if(is_array($visit_companyArr)): foreach($visit_companyArr as $k=>$vo): ?><tr <?php if(($k%2) == "0"): ?>class="odd"
										<?php else: ?>
										class="even"<?php endif; ?>>
								    	   <td><input type="text" name="visit_company[]" value="<?php echo ($vo); ?>" class="input-large" required="required"></td>
								    	    <td><input type="text" name="vister_man[]" value="<?php echo ($vister_manArr[$k]); ?>" class="input-large" required="required"></td>
								    	     <td><input type="text" name="vister_man_position[]" value="<?php echo ($vister_man_positionArr[$k]); ?>" class="input-large" required="required"></td>
								    	    <td>
								    	    	<a href="javascript:#" onclick="addItem(this)">添加一行</a>
								    	    	<a href="javascript:#" onclick="removeItem(this)">删除一行</a>
								    	    </td>
								    	</tr><?php endforeach; endif; endif; endif; ?>
								    	    
								 </table>
								 </fieldset>
							
				</form>		

							
							<h3>审核信息：</h3>
							<?php echo ($mo["opinion"]); ?>
							<hr>

							<!-- <fieldset>
								<legend>
									<small>填表说明：</small>
								</legend>
								<p class="table-notes">
									本表仅统计县市区党政主要负责人、分管领导以及招商局主要负责人外出情况.
								</p>
							</fieldset> -->

			
					</div>

				</div>
			</div>
		</div>
		
	</body>

</html>