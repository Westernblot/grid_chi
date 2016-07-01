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
    	
    	layer.config({
    extend: [
        'extend/layer.ext.js',
        'skin/layer.ext.css' //layer-ext-myskin即是你拓展的皮肤文件
    ]
});

//调用示例
layer.ready(function(){ //为了layer.ext.js加载完毕再执行
    layer.photos({
        photos: '#layer-photos-demo_tc'
    });
    layer.photos({
        photos: '#layer-photos-demo_kg'
    });
}); 
    	
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
						<!-- <button class="btn btn-primary" onclick="saveForm()">
							<img src="/grid_chi/Public/images/icon/clipboard.png" class="clipboard"/> 保存
						</button> -->
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div>
					<div class="well you-bg">
						<form id="form1">

             
							<?php if(($showNum) >= "2"): ?><font color="red"><h3>签约信息</h3></font>
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


							<!-- <h3>审核信息：</h3>
							<font color="blue" size="4"><?php echo ($mo["qy_opinion"]); ?></font> -->
							<hr><?php endif; ?>
							
							<?php if(($showNum) >= "3"): ?><font color="red"><h3>注册信息</h3></font>
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
							
							<h3>审核信息：</h3>
							<font color="blue" size="4"><?php echo ($mo["zc_opinion"]); ?></font>
							<hr><?php endif; ?>
							
							<?php if(($showNum) >= "4"): ?><font color="red"><h3>开工信息</h3></font>
							<hr>
							<!-- 开工项目模板 -->
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

							<h3>审核信息：</h3>
							<font color="blue" size="4"><?php echo ($mo["kg_opinion"]); ?></font>
							<hr><?php endif; ?>
							
							<?php if(($showNum) >= "5"): ?><font color="red"><h3>投产信息</h3></font>
							<hr>
							<!-- 投产项目模板 -->
							<table class="youAdd tabAudit">
	<tr>
		<td class="TDleft"><label>累计实际到资总额[亿元]</label></td>
		<td width="30%">
		<?php echo ($mo["tc_accumulative_in_invest"]); ?>
		</td>
		<td class="TDleft"><label>投产时间：</label></td>
		<td>
		<?php echo ($mo["tc_date"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>已形成产能[万元]：</label></td>
		<td>
		<?php echo ($mo["tc_capacity"]); ?>
		</td>
		<td class="TDleft"><label>月度销售收入[万元]</label></td>
		<td>
		<?php echo ($mo["tc_month_sale_money"]); ?>
		</td>
	</tr>
	<tr>
		<td class="TDleft"><label>投产备注：</label></td>
		<td colspan="3">
		<?php echo ($mo["tc_remark"]); ?>
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
		       <!-- <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a> -->
		     </div><?php endforeach; endif; endif; ?>
		    		  
</div>  		  
		    		<!-- <input type="file" id="file_tc" name="file_tc" onchange="doUploadTC()" /> -->
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




<script type="text/javascript">



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
							<h3>审核信息：</h3>
							<font color="blue" size="4"><?php echo ($mo["tc_opinion"]); ?></font>
							<hr><?php endif; ?>

						</form>
					</div>

				</div>
			</div>
		</div>
	</body>
	
</html>