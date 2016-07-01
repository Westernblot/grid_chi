<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/js/combo/dhtmlxcombo.css"/>
		<script src="/grid_chi/Public/js/combo/dhtmlxcombo.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/layer/jquery-1.9.1.js"></script>
	<script src="/grid_chi/Public/validate/jquery.js"></script>
    <script src="/grid_chi/Public/validate/jquery.validate.min.js"></script>
    <script src="/grid_chi/Public/validate/localization/messages_zh.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/ajaxfileupload.js"></script>

		<script type="text/javascript" src="/grid_chi/Public/layer/layer.js"></script>
		<script type="text/javascript">
			$().ready(function() {
                   $("#form1").validate();
             });
			//提交审核
			function submitAudit() {
					// var checked = checkForm('#form1');
					// if (checked == false) {
						// return;
				// }
				
				var zc_date = $('#zc_date').val();
				if(zc_date>='201601'){
					alert('注册时间为2016年的不能直接上报开工项目！');
					return;
				}
				
					//========================投资额超过100亿元提醒=====================
				var qy_total_invest= $("input[name='qy_total_invest']").val();
				var qy_first_invest= $("input[name='qy_first_invest']").val();
				
				if(qy_total_invest>100 || qy_first_invest>100){
					if(confirm("提示：投资额超过了100亿元！确定吗?")){
						$('#tc_flag').attr('value','已保存');
				        $('#form1').submit();
					}
					return;
				}
				//===========================================================
				$('#tc_flag').attr('value', '审核中');
				$('#form1').submit();
			}

			function saveForm() {
					// var checked = checkForm('#form1');
					// if (checked == false) {
						// return;
				// }
				
				var zc_date = $('#zc_date').val();
				if(zc_date>='201601'){
					alert('注册时间为2016年的不能直接上报开工项目！');
					return;
				}
				
					//========================投资额超过100亿元提醒=====================
				var qy_total_invest= $("input[name='qy_total_invest']").val();
				var qy_first_invest= $("input[name='qy_first_invest']").val();
				
				if(qy_total_invest>100 || qy_first_invest>100){
					if(confirm("提示：投资额超过了100亿元！确定吗?")){
						$('#tc_flag').attr('value','已保存');
				        $('#form1').submit();
					}
					return;
				}
				//===========================================================
				$('#tc_flag').attr('value', '已保存');
				$('#form1').submit();
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
					<a href="/grid_chi/index.php/Admin/Project/tcProjectMain">投产项目一览表</a><span class="divider">/</span>
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
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div>
					<div class="well you-bg">
						<form id="form1" action="<?php echo ($mo==null?'/grid_chi/index.php/Admin/Project/insert':'/grid_chi/index.php/Admin/Project/update'); ?>?toPage=<?php echo ($toPage); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>" />
							<input type="hidden" name="tc_status" value="已投产" />
							<input type="hidden" id="tc_flag" name="tc_flag" value="" />

 <?php if(($mo["qy_flag"]) != "审核通过" && ($mo["zc_flag"]) != "审核通过" && ($mo["kg_flag"]) != "审核通过" && ($mo["tc_flag"]) != "审核通过"): ?>
							

							<font color="red"><h3>签约信息</h3></font>
							<hr>
							<!-- 签约项目模板 -->
							<table class="youAdd">
	
	<tr>
		<td class="TDleft"><label>项目名称：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="qy_project_name" value="<?php echo ($mo["qy_project_name"]); ?>" class="input-xlarge" required="true">
		</td>
		<td class="TDleft"><label>建设内容：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="qy_build_content" value="<?php echo ($mo["qy_build_content"]); ?>" class="input-xlarge" required="true">
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>本地投资方：</label></td>
		<td>
		<input type="text" name="qy_local_investor" value="<?php echo ($mo["qy_local_investor"]); ?>" class="input-xlarge" >
		</td>
		<td class="TDleft"><label>外来投资方：</label></td>
		<td>
		<input type="text" name="qy_outside_investor" value="<?php echo ($mo["qy_outside_investor"]); ?>" class="input-xlarge" >
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>总投资额[亿元]：<font color="red">*</font></label></td>
		<td>
		<input type="number" name="qy_total_invest" value="<?php echo ($mo["qy_total_invest"]); ?>" class="input-xlarge" required>
		</td>
		<td class="TDleft"><label>一期投资额[亿元]：<font color="red">*</font></label></td>
		<td>
		<input type="number" name="qy_first_invest" value="<?php echo ($mo["qy_first_invest"]); ?>" class="input-xlarge" required>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>行业类别：<font color="red">*</font></label></td>
		<td >
	    <!-- <input type="text" name="qy_trade_type" value="<?php echo ($mo["qy_trade_type"]); ?>" class="input-xlarge"> -->
		<select id="qy_trade_type" name="qy_trade_type" required>
			   <option value="" <?php if(($mo["qy_trade_type"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "行业"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["qy_trade_type"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		</td>
		<td class="TDleft"><label>产业类别：<font color="red">*</font></label></td>
		<td>
		<!-- <input type="text" name="qy_industry_category" value="<?php echo ($mo["qy_industry_category"]); ?>" class="input-xlarge"> -->
		<select id="qy_industry_category" name="qy_industry_category" required>
			<option value="" <?php if(($mo["qy_industry_category"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "产业类别"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["qy_industry_category"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		</td>
	</tr>
	<tr>
	    <td class="TDleft"><label>签约时间：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="qy_date" value="<?php echo ($mo["qy_date"]); ?>"  class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" required>
		</td>
		<td class="TDleft"><label>签约备注：</label></td>
		<td >
		<!-- <input type="text" name="qy_remark" value="<?php echo ($mo["qy_remark"]); ?>" class="input-xlarge"> -->
		<textarea name="qy_remark" rows="3" cols="100"><?php echo ($mo["qy_remark"]); ?></textarea>
		</td>
	</tr>
</table>
    <?php else: ?> 
						

							<font color="red"><h3>签约信息</h3></font>
							<hr>
							<!-- 签约项目模板 -->
							<table class="youAdd tabAudit">
	<tr>
		<td class="TDleft"><label>项目名称：</label></td>
		<td width="30%">
		<?php echo ($mo["qy_project_name"]); ?>
		</td>
		<td class="TDleft"><label>建设内容：</label></td>
		<td>
		<?php echo ($mo["qy_build_content"]); ?>
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>本地投资方：</label></td>
		<td>
		<?php echo ($mo["qy_local_investor"]); ?>
		</td>
		<td class="TDleft"><label>外来投资方：</label></td>
		<td>
		<?php echo ($mo["qy_outside_investor"]); ?>
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>总投资额[亿元]：</label></td>
		<td>
		<?php echo ($mo["qy_total_invest"]); ?>
		</td>
		<td class="TDleft"><label>一期投资额[亿元]：</label></td>
		<td>
		<?php echo ($mo["qy_first_invest"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>行业类别：</label></td>
		<td >
	   <?php echo ($mo["qy_trade_type"]); ?>
		</td>
		<td class="TDleft"><label>产业类别：</label></td>
		<td>
		<?php echo ($mo["qy_industry_category"]); ?>
		</td>
	</tr>
	<tr>
	    <td class="TDleft"><label>签约时间：</label></td>
		<td>
		<?php echo ($mo["qy_date"]); ?>
		</td>
		<td class="TDleft"><label>签约备注：</label></td>
		<td >
		<?php echo ($mo["qy_remark"]); ?>
		</td>
	</tr>
</table>


	<?php endif; ?>	

 <?php if(($mo["zc_flag"]) != "审核通过" && ($mo["kg_flag"]) != "审核通过" && ($mo["tc_flag"]) != "审核通过"): ?>
							<font color="red"><h3>注册信息</h3></font>
							<hr>
							<!-- 注册项目模板 -->
							<table class="youAdd">
	<tr>
		<td class="TDleft"><label>工商注册号：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="zc_register_no" value="<?php echo ($mo["zc_register_no"]); ?>" class="input-xlarge" required="true">
		</td>
		<td class="TDleft"><label>在黄注册名称：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="zc_hs_name" value="<?php echo ($mo["zc_hs_name"]); ?>" class="input-xlarge" required="true">
		</td>
	</tr>
		
	<tr>
		<td class="TDleft"><label>注册资本[万元]：<font color="red">*</font></label></td>
		<td>
		<input type="number" name="zc_capital" value="<?php echo ($mo["zc_capital"]); ?>" class="input-xlarge" required="true">
		</td>
		<td class="TDleft"><label>法人代表：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="zc_legal_person" value="<?php echo ($mo["zc_legal_person"]); ?>" class="input-xlarge" required="true">
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>经营范围：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="zc_operate_scope" value="<?php echo ($mo["zc_operate_scope"]); ?>" class="input-xlarge" required="true">
		</td>
		<td class="TDleft"><label>注册时间：<font color="red">*</font></label></td>
		<td>
		<input type="text" id="zc_date" name="zc_date" value="<?php echo ($mo["zc_date"]); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" required="true">
		</td>
		
	</tr>
	<tr>
		<td class="TDleft"><label>本地股东：</label></td>
		<td>
		<input type="text" name="zc_local_shareholder" value="<?php echo ($mo["zc_local_shareholder"]); ?>" class="input-xlarge">
		</td>
	    <td class="TDleft"><label>出资额[万元]：</label></td>
		<td>
		<input type="number" name="zc_local_invest" value="<?php echo ($mo["zc_local_invest"]); ?>" class="input-xlarge">
		</td>
		
	</tr>
	<tr>
		<td class="TDleft"><label>市外股东：</label></td>
		<td>
		<input type="text" name="zc_outside_shareholder" value="<?php echo ($mo["zc_outside_shareholder"]); ?>" class="input-xlarge">
		</td>
		<td class="TDleft"><label>出资额[万元]：</label></td>
		<td>
		<input type="number" name="zc_outside_invest" value="<?php echo ($mo["zc_outside_invest"]); ?>" class="input-xlarge">
		</td>
	</tr>

	<!-- <tr>
		<td class="TDleft"><label>投资额[亿元]：</label></td>
		<td>
		<input type="text" name="zc_invest" value="<?php echo ($mo["zc_invest"]); ?>" class="input-xlarge">
		</td>
		<td class="TDleft"><label>占比：</label></td>
		<td>
		<input type="text" name="zc_rate" value="<?php echo ($mo["zc_rate"]); ?>" class="input-xlarge">
		</td>
	</tr> -->
	
	<tr>
		<td class="TDleft"><label>建设地点[注明园区]：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="zc_build_place" value="<?php echo ($mo["zc_build_place"]); ?>" class="input-xlarge" required="true">
		</td> 
		<td class="TDleft"><label>项目用地[亩]：<font color="red">*</font></label></td>
		<td>
		<input type="number" name="zc_user_land" value="<?php echo ($mo["zc_user_land"]); ?>" class="input-xlarge" required="true">
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>项目引荐单位：</label></td>
		<td>
		<input type="text" name="zc_recommend_company" value="<?php echo ($mo["zc_recommend_company"]); ?>" class="input-xlarge">
		</td>
		<td class="TDleft"><label>所属产业链：<font color="red">*</font></label></td>
		<td>
		<select id="zc_industry_chain" name="zc_industry_chain" required="true">
			   <option value="" <?php if(($mo["zc_industry_chain"]) == ""): ?>selected<?php endif; ?>>-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "所属产业链"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["zc_industry_chain"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>注册备注：</label></td>
		<td colspan="3">
		<textarea class="input-xxlarge" name="zc_remark"><?php echo ($mo["zc_remark"]); ?></textarea>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>注册提供附件：</label></td>
		    	<td colspan="3">
		    		  
		    	
		    		  
<div id="div_attachment_zc">
					
		 <!-- 如果有附件就显示 -->	     
	<?php if(!empty($mo["zc_attachment_url"])): if(is_array($zc_attachment_urlArr)): foreach($zc_attachment_urlArr as $k=>$vo): ?><div>	      
		       <a href="<?php echo ($vo); ?>" target="_blank"><?php echo ($zc_attachmentArr[$k]); ?></a>
		       <input type="hidden" id="zc_attachment" name="zc_attachment[]" value="<?php echo ($zc_attachmentArr[$k]); ?>"  />
		       <input type="hidden" id="zc_attachment_url" name="zc_attachment_url[]" value="<?php echo ($vo); ?>" />
		       <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>
		     </div><?php endforeach; endif; endif; ?>
		    		  
</div>  		  
		    		<input type="file" id="file_zc" name="file_zc" onchange="doUploadZC()" />
		    	</td>
	</tr>
	 <tr>
		    	<td class="TDleft"><label>高拍仪：</label></td>
		    	<td colspan="3">
		    		<div id="div_zc_gpy_attachment">
	
	<?php if(!empty($mo["zc_gpy"])): if(is_array($zc_gpyArr)): foreach($zc_gpyArr as $k=>$vo): ?><div>	      
		       <a href="/grid_chi/Uploads/gpy/<?php echo ($vo); ?>" target="_blank"><?php echo ($vo); ?></a>
		       <input type="hidden" id="zc_gpy" name="zc_gpy[]" value="<?php echo ($vo); ?>" />
		       <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>
		     </div><?php endforeach; endif; endif; ?>	
		
		    		</div>
		    		<input type="button" name="" value="从高拍仪拍照" onclick="popLayerZC()" />
		    		
		    	</td>
		    </tr>
</table>


<script type="text/javascript">

    //弹出操作窗口
	    function popLayerZC(){
	    	
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
             
              var div = $('#div_zc_gpy_attachment');
              for(var i=0;i<gpyArr.length;i++){
              	var name = gpyArr[i];
              	if(name!=''){             		
				var html = '<div>'
						    +'<a href="/grid_chi/Uploads/gpy/'+name+'" target="_blank">'+name+'</a>'
		                    +'<input type="hidden" id="zc_gpy" name="zc_gpy[]" value="'+name+'" />'
		                    +'<a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>'
							+'</div>';
				div.append(html);
              	}
              }
             
             
             
          layer.close(index); //如果设定了yes回调，需进行手工关闭
         }
    });
	    
	    }


function doUploadZC(){
	 $.ajaxFileUpload
     (
         {
             url: '/grid_chi/index.php/Home/File/upload', //用于文件上传的服务器端请求地址
             type: 'post',
             data: { fileId: 'file_zc', name: 'lunis' }, //此参数非常严谨，写错一个引号都不行
             secureuri: false, //一般设置为false
             fileElementId: 'file_zc', //文件上传空间的id属性  <input type="file" id="file1" name="file1" />
             dataType: 'text', //返回值类型 一般设置为json
             success: function (data, status)  //服务器成功响应处理函数
             {
                var name=data.name;
                var url=data.url;
                var href = url;
                 
                
               //alert(name+";"+url);
                
                var div = $('#div_attachment_zc');
				var html = '<div>'
						    +'<input type="hidden" name="zc_attachment[]" value="'+name+'">'
							+'<input type="hidden" name="zc_attachment_url[]" value="'+url+'">'
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
</script>

	 <?php else: ?> 
			                <font color="red"><h3>注册信息</h3></font>
							<hr>
							<!-- 注册项目模板 -->
							<table class="youAdd tabAudit">
	<tr>
		<td class="TDleft"><label>工商注册号：</label></td>
		<td width="30%">
		<?php echo ($mo["zc_register_no"]); ?>
		</td>
		<td class="TDleft"><label>在黄注册名称：</label></td>
		<td>
		<?php echo ($mo["zc_hs_name"]); ?>
		</td>
	</tr>
		
	<tr>
		<td class="TDleft"><label>注册资本[万元]：</label></td>
		<td>
		<?php echo ($mo["zc_capital"]); ?>
		</td>
		<td class="TDleft"><label>法人代表：</label></td>
		<td>
		<?php echo ($mo["zc_legal_person"]); ?>
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>经营范围：</label></td>
		<td>
		<?php echo ($mo["zc_operate_scope"]); ?>
		</td>
		<td class="TDleft"><label>注册时间：</label></td>
		<td>
		<?php echo ($mo["zc_date"]); ?>
		</td>
		
	</tr>
	<tr>
		<td class="TDleft"><label>本地股东：</label></td>
		<td>
		<?php echo ($mo["zc_local_shareholder"]); ?>
		</td>
	    <td class="TDleft"><label>出资额[万元]：</label></td>
		<td>
		<?php echo ($mo["zc_local_invest"]); ?>
		</td>
		
	</tr>
	<tr>
		<td class="TDleft"><label>市外股东：</label></td>
		<td>
		<?php echo ($mo["zc_outside_shareholder"]); ?>
		</td>
		<td class="TDleft"><label>出资额[万元]：</label></td>
		<td>
		<?php echo ($mo["zc_outside_invest"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>建设地点[注明园区]：</label></td>
		<td>
		<?php echo ($mo["zc_build_place"]); ?>
		</td> 
		<td class="TDleft"><label>项目用地[亩]：</label></td>
		<td>
		<?php echo ($mo["zc_user_land"]); ?>
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>项目引荐单位：</label></td>
		<td>
		<?php echo ($mo["zc_recommend_company"]); ?>
		</td>
		<td class="TDleft"><label>所属产业链：</label></td>
		<td>
			<?php echo ($mo["zc_industry_chain"]); ?>
		</td>
	</tr>
	
	<tr>
		<td class="TDleft"><label>注册备注：</label></td>
		<td colspan="3">
		<?php echo ($mo["zc_remark"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>注册提供附件：</label></td>
		    	<td colspan="3">
		    		  
		    	
		    		  
<div id="div_attachment_zc">
					
		 <!-- 如果有附件就显示 -->	     
	<?php if(!empty($mo["zc_attachment_url"])): if(is_array($zc_attachment_urlArr)): foreach($zc_attachment_urlArr as $k=>$vo): ?><div>	      
		       <a href="<?php echo ($vo); ?>" target="_blank"><?php echo ($zc_attachmentArr[$k]); ?></a>
		       <input type="hidden" id="zc_attachment" name="zc_attachment[]" value="<?php echo ($zc_attachmentArr[$k]); ?>"  />
		       <input type="hidden" id="zc_attachment_url" name="zc_attachment_url[]" value="<?php echo ($vo); ?>" />
		       <!-- <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a> -->
		     </div><?php endforeach; endif; endif; ?>
		    		  
</div>  		  
		    		<!-- <input type="file" id="file_zc" name="file_zc" onchange="doUploadZC()" /> -->
		    	</td>
	</tr>
		 <tr>
		    	<td class="TDleft"><label>高拍仪：</label></td>
		    	<td colspan="3">
		    		<div id="div_zc_gpy_attachment">
	
	<?php if(!empty($mo["zc_gpy"])): if(is_array($zc_gpyArr)): foreach($zc_gpyArr as $k=>$vo): ?><div>	      
		       <a href="/grid_chi/Uploads/gpy/<?php echo ($vo); ?>" target="_blank"><?php echo ($vo); ?></a>
		     </div><?php endforeach; endif; endif; ?>	
		
		    		</div>
		    		
   
		    		
		    	</td>
		    </tr>
</table>


<script type="text/javascript">

function doUploadZC(){
	 $.ajaxFileUpload
     (
         {
             url: '/grid_chi/index.php/Home/File/upload', //用于文件上传的服务器端请求地址
             type: 'post',
             data: { fileId: 'file_zc', name: 'lunis' }, //此参数非常严谨，写错一个引号都不行
             secureuri: false, //一般设置为false
             fileElementId: 'file_zc', //文件上传空间的id属性  <input type="file" id="file1" name="file1" />
             dataType: 'text', //返回值类型 一般设置为json
             success: function (data, status)  //服务器成功响应处理函数
             {
                var name=data.name;
                var url=data.url;
                var href = url;
                 
                
               //alert(name+";"+url);
                
                var div = $('#div_attachment_zc');
				var html = '<div>'
						    +'<input type="hidden" name="zc_attachment[]" value="'+name+'">'
							+'<input type="hidden" name="zc_attachment_url[]" value="'+url+'">'
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
</script>

  <?php endif; ?>	

<?php if(($mo["kg_flag"]) != "审核通过" && ($mo["tc_flag"]) != "审核通过"): ?>
							<font color="red"><h3>开工信息</h3></font>
							<hr>
							<!-- 开工信息模板 -->
							<table class="youAdd">
	<tr>
		<td class="TDleft"><label>本地投资额[亿元]：</label></td>
		<td>
		<input type="number" name="kg_local_invest" value="<?php echo ($mo["kg_local_invest"]); ?>" class="input-xlarge">
		</td>
	
		<td class="TDleft"><label>市外投资额[亿元]：</label></td>
		<td>
		<input type="number" name="kg_outside_invest" value="<?php echo ($mo["kg_outside_invest"]); ?>" class="input-xlarge">
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>投资方实际到资额[亿元]：<font color="red">*</font></label></td>
		<td>
		<input type="number" name="kg_actual_in_invest" value="<?php echo ($mo["kg_actual_in_invest"]); ?>" class="input-xlarge" required="required">
		</td>
	
		<td class="TDleft"><label>开工时间：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="kg_date" value="<?php echo ($mo["kg_date"]); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" required="required">
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>开工备注：</label></td>
		<td colspan="3">
		<textarea class="input-xxlarge" name="kg_remark"><?php echo ($mo["kg_remark"]); ?></textarea>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>开工提供附件：</label></td>
		    	<td colspan="3">
		    		  
		    	
		    		  
<div id="div_attachment_kg">
					
		 <!-- 如果有附件就显示 -->	     
	<?php if(!empty($mo["kg_attachment_url"])): if(is_array($kg_attachment_urlArr)): foreach($kg_attachment_urlArr as $k=>$vo): ?><div>	      
		       <a href="<?php echo ($vo); ?>" target="_blank"><?php echo ($kg_attachmentArr[$k]); ?></a>
		       <input type="hidden" id="kg_attachment" name="kg_attachment[]" value="<?php echo ($kg_attachmentArr[$k]); ?>"  />
		       <input type="hidden" id="kg_attachment_url" name="kg_attachment_url[]" value="<?php echo ($vo); ?>" />
		       <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>
		     </div><?php endforeach; endif; endif; ?>
		    		  
</div>  		  
		    		<input type="file" id="file_kg" name="file_kg" onchange="doUploadKG()" />
		    	</td>
	</tr>
	 <tr>
		    	<td class="TDleft"><label>高拍仪：</label></td>
		    	<td colspan="3">
		    		<div id="div_kg_gpy_attachment">
	
	<?php if(!empty($mo["kg_gpy"])): if(is_array($kg_gpyArr)): foreach($kg_gpyArr as $k=>$vo): ?><div>	      
		       <a href="/grid_chi/Uploads/gpy/<?php echo ($vo); ?>" target="_blank"><?php echo ($vo); ?></a>
		       <input type="hidden" id="kg_gpy" name="kg_gpy[]" value="<?php echo ($vo); ?>" />
		       <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>
		     </div><?php endforeach; endif; endif; ?>	
		
		    		</div>
		    		<input type="button" name="" value="从高拍仪拍照" onclick="popLayerKG()" />
		    		
		    	</td>
		    </tr>
</table>

<script type="text/javascript">


//弹出操作窗口
	    function popLayerKG(){
	    	
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
             
              var div = $('#div_kg_gpy_attachment');
              for(var i=0;i<gpyArr.length;i++){
              	var name = gpyArr[i];
              	if(name!=''){             		
				var html = '<div>'
						    +'<a href="/grid_chi/Uploads/gpy/'+name+'" target="_blank">'+name+'</a>'
		                    +'<input type="hidden" id="kg_gpy" name="kg_gpy[]" value="'+name+'" />'
		                    +'<a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>'
							+'</div>';
				div.append(html);
              	}
              }
             
             
             
          layer.close(index); //如果设定了yes回调，需进行手工关闭
         }
    });
	    
	    }


function doUploadKG(){
	 $.ajaxFileUpload
     (
         {
             url: '/grid_chi/index.php/Home/File/upload', //用于文件上传的服务器端请求地址
             type: 'post',
             data: { fileId: 'file_kg', name: 'lunis' }, //此参数非常严谨，写错一个引号都不行
             secureuri: false, //一般设置为false
             fileElementId: 'file_kg', //文件上传空间的id属性  <input type="file" id="file1" name="file1" />
             dataType: 'text', //返回值类型 一般设置为json
             success: function (data, status)  //服务器成功响应处理函数
             {
                var name=data.name;
                var url=data.url;
                var href = url;
                 
                
               //alert(name+";"+url);
                
                var div = $('#div_attachment_kg');
				var html = '<div>'
						    +'<input type="hidden" name="kg_attachment[]" value="'+name+'">'
							+'<input type="hidden" name="kg_attachment_url[]" value="'+url+'">'
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
</script>
		 <?php else: ?> 
			                <font color="red"><h3>开工信息</h3></font>
							<hr>
							<!-- 开工信息模板 -->
							<table class="youAdd tabAudit">
	<tr>
		<td class="TDleft"><label>本地投资额[亿元]：</label></td>
		<td width="30%">
		<?php echo ($mo["kg_local_invest"]); ?>
		</td>
	
		<td class="TDleft"><label>市外投资额[亿元]：</label></td>
		<td>
		<?php echo ($mo["kg_outside_invest"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>投资方实际到资额[亿元]：</label></td>
		<td>
		<?php echo ($mo["kg_actual_in_invest"]); ?>
		</td>
	
		<td class="TDleft"><label>开工时间：</label></td>
		<td>
		<?php echo ($mo["kg_date"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>开工备注：</label></td>
		<td colspan="3">
		<?php echo ($mo["kg_remark"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>开工提供附件：</label></td>
		    	<td colspan="3">
		    		  
		    	
		    		  
<div id="div_attachment_kg">
					
		 <!-- 如果有附件就显示 -->	     
	<?php if(!empty($mo["kg_attachment_url"])): if(is_array($kg_attachment_urlArr)): foreach($kg_attachment_urlArr as $k=>$vo): ?><div>	      
		       <a href="<?php echo ($vo); ?>" target="_blank"><?php echo ($kg_attachmentArr[$k]); ?></a>
		       <input type="hidden" id="kg_attachment" name="kg_attachment[]" value="<?php echo ($kg_attachmentArr[$k]); ?>"  />
		       <input type="hidden" id="kg_attachment_url" name="kg_attachment_url[]" value="<?php echo ($vo); ?>" />
		       <!-- <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a> -->
		     </div><?php endforeach; endif; endif; ?>
		    		  
</div>  		  
		    		<!-- <input type="file" id="file_kg" name="file_kg" onchange="doUploadKG()" /> -->
		    	</td>
	</tr>
		 <tr>
		    	<td class="TDleft"><label>高拍仪：</label></td>
		    	<td colspan="3">
		    		<div id="div_tc_gpy_attachment">
	
	<?php if(!empty($mo["tc_gpy"])): if(is_array($tc_gpyArr)): foreach($tc_gpyArr as $k=>$vo): ?><div>	      
		       <a href="/grid_chi/Uploads/gpy/<?php echo ($vo); ?>" target="_blank"><?php echo ($vo); ?></a>
		   
		     </div><?php endforeach; endif; endif; ?>	
		
		    		</div>
		    	
		    	</td>
		    </tr>
</table>

 <?php endif; ?>

							<font color="red"><h3>投产信息</h3></font>
							<hr>
							<!-- 投产项目模板 -->
							<table class="youAdd">
	<tr>
		<td class="TDleft"><label>累计实际到资总额[亿元]：<font color="red">*</font></label></td>
		<td>
		<input type="number" name="tc_accumulative_in_invest" value="<?php echo ($mo["tc_accumulative_in_invest"]); ?>" class="input-xlarge" required="required">
		</td>
		<td class="TDleft"><label>投产时间：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="tc_date" value="<?php echo ($mo["tc_date"]); ?>" class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})" required="required">
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>已形成产能[万元]：</label></td>
		<td>
		<input type="number" name="tc_capacity" value="<?php echo ($mo["tc_capacity"]); ?>" class="input-xlarge">
		</td>
		<td class="TDleft"><label>月度销售收入[万元]：</label></td>
		<td>
		<input type="number" name="tc_month_sale_money" value="<?php echo ($mo["tc_month_sale_money"]); ?>" class="input-xlarge">
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>投产备注：</label></td>
		<td colspan="3">
		<!-- <input type="text" name="tc_remark" value="<?php echo ($mo["tc_remark"]); ?>" class="input-xlarge"> -->
		<textarea class="input-xxlarge" name="tc_remark" rows="3" cols="100"><?php echo ($mo["tc_remark"]); ?></textarea>
		</td>		
	</tr>
	<tr>
		<td class="TDleft"><label>投产提供附件：</label></td>
		    	<td colspan="3">
		    		  
		    	
		    		  
<div id="div_attachment_tc">
					
		 <!-- 如果有附件就显示 -->	     
	<?php if(!empty($mo["tc_attachment_url"])): if(is_array($tc_attachment_urlArr)): foreach($tc_attachment_urlArr as $k=>$vo): ?><div>	      
		       <a href="<?php echo ($vo); ?>" target="_blank"><?php echo ($tc_attachmentArr[$k]); ?></a>
		       <input type="hidden" id="tc_attachment" name="tc_attachment[]" value="<?php echo ($tc_attachmentArr[$k]); ?>"  />
		       <input type="hidden" id="tc_attachment_url" name="tc_attachment_url[]" value="<?php echo ($vo); ?>" />
		       <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>
		     </div><?php endforeach; endif; endif; ?>
		    		  
</div>  		  
		    		<input type="file" id="file_tc" name="file_tc" onchange="doUploadTC()" />
		    	</td>
	</tr>
	 <tr>
		    	<td class="TDleft"><label>高拍仪：</label></td>
		    	<td colspan="3">
		    		<div id="div_tc_gpy_attachment">
	
	<?php if(!empty($mo["tc_gpy"])): if(is_array($tc_gpyArr)): foreach($tc_gpyArr as $k=>$vo): ?><div>	      
		       <a href="/grid_chi/Uploads/gpy/<?php echo ($vo); ?>" target="_blank"><?php echo ($vo); ?></a>
		       <input type="hidden" id="tc_gpy" name="tc_gpy[]" value="<?php echo ($vo); ?>" />
		       <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>
		     </div><?php endforeach; endif; endif; ?>	
		
		    		</div>
		    		<input type="button" name="" value="从高拍仪拍照" onclick="popLayerTC()" />
		    		
		    	</td>
		    </tr>
</table>
<script type="text/javascript">

//弹出操作窗口
	    function popLayerTC(){
	    	
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
             
              var div = $('#div_tc_gpy_attachment');
              for(var i=0;i<gpyArr.length;i++){
              	var name = gpyArr[i];
              	if(name!=''){             		
				var html = '<div>'
						    +'<a href="/grid_chi/Uploads/gpy/'+name+'" target="_blank">'+name+'</a>'
		                    +'<input type="hidden" id="tc_gpy" name="tc_gpy[]" value="'+name+'" />'
		                    +'<a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a>'
							+'</div>';
				div.append(html);
              	}
              }
             
             
             
          layer.close(index); //如果设定了yes回调，需进行手工关闭
         }
    });
	    
	    }

function doUploadTC(){
	 $.ajaxFileUpload
     (
         {
             url: '/grid_chi/index.php/Home/File/upload', //用于文件上传的服务器端请求地址
             type: 'post',
             data: { fileId: 'file_tc', name: 'lunis' }, //此参数非常严谨，写错一个引号都不行
             secureuri: false, //一般设置为false
             fileElementId: 'file_tc', //文件上传空间的id属性  <input type="file" id="file1" name="file1" />
             dataType: 'text', //返回值类型 一般设置为json
             success: function (data, status)  //服务器成功响应处理函数
             {
                var name=data.name;
                var url=data.url;
                var href = url;
                 
                
               //alert(name+";"+url);
                
                var div = $('#div_attachment_tc');
				var html = '<div>'
						    +'<input type="hidden" name="tc_attachment[]" value="'+name+'">'
							+'<input type="hidden" name="tc_attachment_url[]" value="'+url+'">'
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
</script>

							<h3>审核记录</h3>
							<font color="blue"><?php echo ($mo["tc_opinion"]); ?></font>

						</form>
					</div>

				</div>
			</div>
		</div>
	</body>

</html>