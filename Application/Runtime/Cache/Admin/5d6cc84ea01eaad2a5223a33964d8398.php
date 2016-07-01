<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>用户列表</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/js/combo/dhtmlxcombo.css"/>
		<script src="/grid_chi/Public/js/combo/dhtmlxcombo.js"></script>
       <script type="text/javascript" src="/grid_chi/Public/js/jquery.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
	<script type="text/javascript">
		 //给审核意见
	   function giveOpinion(obj){
	   	 var val = $(obj).val();
	   	 $('#opinion').text(val);
	   }
		function auditFlag(flag) {
			var checked = checkForm('#form1');
			if (checked == false) {
				return;
			}
			if (confirm("确定操作吗？")) {
			   $('#fieldValue_flag').attr('value',flag);
			   $('#form1').submit();
			}
		}
		
		//展开、隐藏
		function toggle(obj,div){
			var qy_val = $(obj).val();
			if(qy_val=='隐藏'){
				$('#'+div).attr('style','display:none');
			}else{
			    $('#'+div).attr('style','display:block');
			}
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
					<a href="/grid_chi/index.php/Admin/Project/ztProjectMain">在谈项目一览表</a><span class="divider">/</span>
				</li>
				<li class="active">
					添加项目
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">
					<div class="btn-toolbar">
						<!-- <button class="btn btn-primary" onclick="auditFlag('审核通过')">
							 审核通过
						</button>
						<button class="btn " onclick="auditFlag('审核未通过')">
							 审核未通过
						</button> -->
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div>
					<div class="well you-bg">
						<form id="form1" action="/grid_chi/index.php/Admin/Project/cmdProjectAudit?toPage=<?php echo ($toPage); ?>&flag=<?php echo ($flag); ?>&add_dept=<?php echo ($add_dept); ?>&s_date=<?php echo ($s_date); ?>&e_date=<?php echo ($e_date); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>" />
							<input type="hidden" id="fieldValue_flag" name="fieldValue_flag" value="" />            <!-- 审核值:动态赋予 -->
							<input type="hidden" name="field_flag" value="zc_flag" />          <!-- 审核字段 -->
							<input type="hidden" name="field_opinion" value="zc_opinion" />    <!-- 审核意见字段 -->
							<!-- $field_flag = '', $fieldValue_flag = '',$field_opinion='', $opinion = '' -->
                            
                          <font color="blue">填报单位：[<?php echo ($mo["add_dept"]); ?>]</font>  
							
							<font color="red"><h3>签约信息<select onchange="toggle(this,'div_qy')">
								  <option value="隐藏">隐藏</option>
								  <option value="展开">展开</option>
								  </select></h3>
								</font>
							<hr> 
							<!-- 签约项目模板 -->
							<div id="div_qy" style="display: none">							
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


							</div>
							
							<font color="red"><h3>注册信息</h3></font>
							<hr>
							<!-- 签约项目模板 -->
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


                            <h3>审核记录</h3>
                            <font color="blue"><?php echo ($mo["zc_opinion"]); ?></font>
                            
              <?php if(($mo["zc_flag"]) != "审核通过"): ?><h3>本次审核意见：</h3>
               <select id="sel_opinion" name="sel_opinion" onchange="giveOpinion(this)">
               <option value="" >-请选择-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "审核意见"): ?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
               </select><br>
							<textarea id="opinion" name="opinion"></textarea>
					<div class="btn-toolbar">
						
						<input type="button" class="btn btn-primary" value="审核通过" onclick="auditFlag('审核通过')" />
						<input type="button" class="btn btn-primary" value="暂未通过" onclick="auditFlag('暂未通过')" />
						<input type="button" class="btn" value="审核未通过" onclick="auditFlag('审核未通过')" />
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div><?php endif; ?>              
					
						</form>
					</div>

				</div>
			</div>
		</div>
	</body>
	
</html>