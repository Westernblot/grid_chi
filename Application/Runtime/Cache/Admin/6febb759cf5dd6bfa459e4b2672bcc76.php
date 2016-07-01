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
		<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/ajaxfileupload.js"></script>

		<script type="text/javascript" src="/grid_chi/Public/layer/layer.js"></script>
		<script type="text/javascript">
			//提交审核
			function submitAudit() {
				var action = $('#form1').attr('action');
				if (action.indexOf('insert') != -1) {
					var checked = checkForm('#form1');
					if (checked == false) {
						return;
					}
				}
					//========================投资额超过100亿元提醒=====================
				var qy_total_invest= $("input[name='qy_total_invest']").val();
				var qy_first_invest= $("input[name='qy_first_invest']").val();
				
				if(qy_total_invest>100 || qy_first_invest>100){
					if(confirm("提示：投资额超过了100亿元！确定吗?")){
						$('#qy_flag').attr('value','已保存');
				        $('#form1').submit();
					}
					return;
				}
				//===========================================================
				$('#kg_flag').attr('value', '审核中');
				$('#form1').submit();
			}

			function saveForm() {
				var action = $('#form1').attr('action');
				if (action.indexOf('insert') != -1) {
					var checked = checkForm('#form1');
					if (checked == false) {
						return;
					}
				}
					//========================投资额超过100亿元提醒=====================
				var qy_total_invest= $("input[name='qy_total_invest']").val();
				var qy_first_invest= $("input[name='qy_first_invest']").val();
				
				if(qy_total_invest>100 || qy_first_invest>100){
					if(confirm("提示：投资额超过了100亿元！确定吗?")){
						$('#qy_flag').attr('value','已保存');
				        $('#form1').submit();
					}
					return;
				}
				//===========================================================
				$('#kg_flag').attr('value', '已保存');
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
					<a href="/grid_chi/index.php/Admin/Project/ztProjectMain">开工项目一览表</a><span class="divider">/</span>
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
							<input type="hidden" name="kg_status" value="已开工" />
							<input type="hidden" id="kg_flag" name="kg_flag" value="" />

							<font color="red"><h3>在谈信息</h3></font>
							<hr>
							<!-- 在谈项目模板 -->
							<table class="youAdd">
	<tr>
		<td class="TDleft"><label>在谈项目名称：</label></td>
		<td>
		<?php echo ($mo["zt_project_name"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>在谈建设内容：</label></td>
		<td>
		<?php echo ($mo["zt_build_content"]); ?>
		</td>
		<td class="TDleft"><label>拟投资额：</label></td>
		<td>
			<?php echo ($mo["zt_plan_invest"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>在谈投资方：</label></td>
		<td>
		<?php echo ($mo["zt_investor"]); ?>
		</td>
		<td class="TDleft"><label>行业：</label></td>
		<td>
			<?php echo ($mo["zt_trade"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>拟建地点：</label></td>
		<td>
		<?php echo ($mo["zt_plan_place"]); ?>
		</td>
		<td class="TDleft"><label>用地情况（亩）：</label></td>
		<td>
		<?php echo ($mo["zt_use_land"]); ?>
		</td>
	</tr>
	<tr>
		<!-- <td class="TDleft"><label>进展状态：</label></td>
		<td>
		<input type="text" name="zt_status" value="<?php echo ($mo["zt_status"]); ?>" class="input-xlarge">
		</td> -->
		<td class="TDleft"><label>联系人：</label></td>
		<td>
		<?php echo ($mo["zt_link_man"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>联系人职务：</label></td>
		<td>
		<?php echo ($mo["zt_link_man_position"]); ?>
		</td>
		<td class="TDleft"><label>联系人电话：</label></td>
		<td>
		<?php echo ($mo["zt_link_man_tel"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>跟踪人：</label></td>
		<td>
		<?php echo ($mo["zt_track_man"]); ?>
		</td>
		<td class="TDleft"><label>跟踪单位：</label></td>
		<td>
		<?php echo ($mo["zt_track_dept"]); ?>
		</td>
	</tr>
</table>

							<font color="red"><h3>签约信息</h3></font>
							<hr>
							<!-- 签约项目模板 -->
							<table class="youAdd">
	<tr>
		<td class="TDleft"><label>项目名称：</label></td>
		<td>
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
		<td class="TDleft"><label>一期投资额（亿元）：</label></td>
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



							<font color="red"><h3>注册信息</h3></font>
							<hr>
							<!-- 注册项目模板 -->
							<table class="youAdd">
	<tr>
		<td class="TDleft"><label>工商注册号：</label></td>
		<td>
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
	    <td class="TDleft"><label>[本地股东]投资额[亿元]：</label></td>
		<td>
		<?php echo ($mo["zc_local_invest"]); ?>
		</td>
		
	</tr>
	<tr>
		<td class="TDleft"><label>市外股东：</label></td>
		<td>
		<?php echo ($mo["zc_outside_shareholder"]); ?>
		</td>
		<td class="TDleft"><label>[市外股东]投资额[亿元]：</label></td>
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
		<td align="right">注册提供附件</td>
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
		    	<td class="TDleft">高拍仪：</td>
		    	<td>
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


							<font color="red"><h3>开工信息</h3></font>
							<hr>
							<!-- 开工项目模板 -->
							<table class="youAdd">
	<tr>
		<td class="TDleft"><label>本地投资额[亿元]：</label></td>
		<td>
		<input type="text" name="kg_local_invest" value="<?php echo ($mo["kg_local_invest"]); ?>" class="input-xlarge">
		</td>
	
		<td class="TDleft"><label>市外投资额[亿元]：</label></td>
		<td>
		<input type="text" name="kg_outside_invest" value="<?php echo ($mo["kg_outside_invest"]); ?>" class="input-xlarge">
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>投资方实际到资额[亿元]：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="kg_actual_in_invest" value="<?php echo ($mo["kg_actual_in_invest"]); ?>" class="input-xlarge" want="yes">
		</td>
	
		<td class="TDleft"><label>开工时间：<font color="red">*</font></label></td>
		<td>
		<input type="text" name="kg_date" value="<?php echo ($mo["kg_date"]); ?>" class="Wdate"  onclick="WdatePicker()" want="yes">
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>开工备注：</label></td>
		<td colspan="3">
		<textarea class="input-xxlarge" name="zc_remark"><?php echo ($mo["kg_remark"]); ?></textarea>
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

							<h3>审核记录</h3>
							<font color="blue"><?php echo ($mo["kg_opinion"]); ?></font>

						</form>
					</div>

				</div>
			</div>
		</div>
	</body>

</html>