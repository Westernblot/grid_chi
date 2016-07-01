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
	<script type="text/javascript" src="/grid_chi/Public/js/sysGeneral.js"></script>
	<script type="text/javascript" src="/grid_chi/Public/js/systemUtils.js"></script>
	<script type="text/javascript">
	 //给审核意见
	   function giveOpinion(obj){
	   	 var val = $(obj).val();
	   	 $('#opinion').text(val);
	   }
	   
		function auditFlag(fieldValue_flag) {
			var checked = checkForm('#form1');
			if (checked == false) {
				return;
			}
			if (confirm("确定操作吗？")) {
			   $('#fieldValue_flag').attr('value',fieldValue_flag);
			   $('#form1').submit();
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
					<a href="/grid_chi/index.php/Admin/Project/ztProjectMain">驻外招商一览表</a><span class="divider">/</span>
				</li>
				<li class="active">
					添加项目
				</li>
			</ul>

			<div class="container-fluid">
				<div class="row-fluid">
					<!-- <div class="btn-toolbar">
						<button class="btn btn-primary" onclick="auditOutside('审核通过')">
							 审核通过
						</button>
						<button class="btn " onclick="auditOutside('审核未通过')">
							 审核未通过
						</button>
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div> -->
					<div class="well you-bg">
						<form id="form1" action="/grid_chi/index.php/Admin/Outside/cmdOutsideAudit?flag=<?php echo ($flag); ?>&add_dept=<?php echo ($add_dept); ?>" method="post">
							<input type="hidden" name="id" value="<?php echo ($mo["id"]); ?>" />
							<input type="hidden" id="fieldValue_flag" name="fieldValue_flag" value="" />

							<table class="youAdd tabAudit">
								<tr>
									<td class="TDleft"><label>姓名：</label></td>
									<td width="30%">
									<?php echo ($mo["name"]); ?>
									</td>
									<td class="TDleft"><label>部门：</label></td>
									<td>
									<?php echo ($mo["dept"]); ?>
									</td>
								</tr>
								<tr>
									<td class="TDleft"><label>招商领导类型：</label></td>
									<td>
									<?php echo ($mo["leader_type"]); ?>
									</td>
									<td class="TDleft"><label>到达目的地：</label></td>
									<td>
								    <?php echo ($mo["dest"]); ?>
									</td>
								</tr>
								<tr>
									<td class="TDleft"><label>开始时间：</label></td>
									<td>
									<?php echo ($mo["sdate"]); ?>
									</td>
									 <td class="TDleft"><label>结束时间：</label></td>
									<td>
									<?php echo ($mo["edate"]); ?>
									</td> 
									
								</tr>
								<tr>
									<td class="TDleft"><label>出访天数：</label></td>
									<td>
									<?php echo ($mo["num"]); ?>
									</td>
									
									<td class="TDleft"><label>所属产业链：</label></td>
									<td>
									<?php echo ($mo["industry_chain"]); ?>
									</td>
								</tr>
								
								<tr>
									<td class="TDleft"><label>备注：</label></td>
									<td colspan="3">
									<?php echo ($mo["remark"]); ?>
									</td>
								</tr>
  <tr>
		    	<td class="TDleft"><label>附件：</label></td>
		    	<td colspan="3">
		    		  
		    	
		    		  
<div id="div_attachment">
					
		 <!-- 如果有附件就显示 -->	     
	<?php if(!empty($mo["attachment_url"])): if(is_array($attachment_urlArr)): foreach($attachment_urlArr as $k=>$vo): ?><div>	      
		       <a href="<?php echo ($vo); ?>" target="_blank"><?php echo ($attachmentArr[$k]); ?></a>
		       <input type="hidden" id="attachment" name="attachment[]" value="<?php echo ($attachmentArr[$k]); ?>"  />
		       <input type="hidden" id="attachment_url" name="attachment_url[]" value="<?php echo ($vo); ?>" />
		       <!-- <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a> -->
		     </div><?php endforeach; endif; endif; ?>
		    		  
</div>  		  
		    		<!-- <input type="file" id="file_attachment" name="file_attachment" onchange="doUpload(this)" /> -->
		    	</td>
		    </tr>
		    <tr>
		    	<td class="TDleft"><label>高拍仪：</label></td>
		    	<td colspan="3">
		    		<div id="div_gpy_attachment">
	
	<?php if(!empty($mo["gpy"])): if(is_array($gpyArr)): foreach($gpyArr as $k=>$vo): ?><div>	      
		       <a href="/grid_chi/Uploads/gpy/<?php echo ($vo); ?>" target="_blank"><?php echo ($vo); ?></a>
		       <input type="hidden" id="gpy" name="gpy[]" value="<?php echo ($vo); ?>" />
		       <!-- <a onclick="removeParent(this)"><img src="/grid_chi/Public/images/remove.png" /></a> -->
		     </div><?php endforeach; endif; endif; ?>	
		
		    		</div>
		    		<!-- <input type="button" name="" value="从高拍仪拍照" onclick="popzDialog()" /> -->
		    		
		    	</td>
		    </tr>
							</table> 
							
							<fieldset class="fieldset" style="width:89%;">
								<legend>
									拜访信息
								</legend>
							    <div class="block-tab" style="margin:0 20px;">
							    <table class="table-mins">
								    	
								    	<tr>
								    	   <th >拜访企业</th>
								    	    <th>接洽人姓名</th>
								    	     <th>接洽人职务</th>
								    	    
								    	</tr>
								    	  
		
		<?php if(!empty($mo["visit_company"])): if(is_array($visit_companyArr)): foreach($visit_companyArr as $k=>$vo): ?><tr <?php if(($k%2) == "0"): ?>class="odd"
										<?php else: ?>
										class="even"<?php endif; ?>>
								    	   <td><?php echo ($vo); ?></td>
								    	    <td><?php echo ($vister_manArr[$k]); ?></td>
								    	     <td><?php echo ($vister_man_positionArr[$k]); ?></td>
								    	   
								    	</tr><?php endforeach; endif; endif; ?>
	
								    	    
								    	
								 </table>
								 </div>
								 </fieldset>
							
							
							<h3>审核记录</h3>
                            <font color="blue"><?php echo ($mo["opinion"]); ?></font>
							 <h3>本次审核意见：</h3>
               <select id="sel_opinion" name="sel_opinion" onchange="giveOpinion(this)">
                  <option value="" >-请选择-</option>
			      <option value="同意" >同意</option>
			      <option value="不同意" >不同意</option>
               </select><br>
							<textarea id="opinion" name="opinion"></textarea>
					<div class="btn-toolbar">
						
						<input type="button" class="btn btn-primary" value="审核通过" onclick="auditFlag('审核通过')" />
						<input type="button" class="btn" value="审核未通过" onclick="auditFlag('审核未通过')" />
						<a href="javascript:history.back();" class="btn">返回</a>
						<div class="btn-group"></div>
					</div>
					

						</form>
					</div>

				</div>
			</div>
		</div>
	</body>

</html>