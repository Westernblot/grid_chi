<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>添加用户</title>
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/common.css">
		<link rel="stylesheet" type="text/css" href="/grid_chi/Public/css/theme.css">
        <script src="/grid_chi/Public/validate/jquery.js"></script>
        <script src="/grid_chi/Public/js/jquery.js"></script>
        <script src="/grid_chi/Public/js/menu.js"></script>
        <script src="/grid_chi/Public/validate/jquery.validate.min.js"></script>
        <script src="/grid_chi/Public/validate/localization/messages_zh.js"></script>
		<script type="text/javascript" src="/grid_chi/Public/js/DatePicker/WdatePicker.js"></script>
        <script type="text/javascript">
        	
        	//点击添加、点击删除
        	function addDelColum(obj){
        		
        		var name = $(obj).attr('name');
        		var value = $(obj).attr('value');
        		var checked = $(obj).attr('checked');
        		//alert(checked);
        		if(checked){
        		    $('#fr_head').append("<th id='"+name+"'>"+value+"</th>");
        		}else{
        			$('#fr_head').find('#'+name).remove();
        			//alert($('#fr_head').find('#'+name).attr('id'));
        		}
        	}
        	
        	//查询
        	function submitForm(){
        		
        		var names = '';
        		var fileds = '';
        		
        		 $("#fr_head th").each(function(){
                  //alert($(this).text());
                    names += $(this).text()+",";
                    fileds += $(this).attr('id')+",";
                 });
                 
                 // alert(names.substring(0,names.length-1));
                 // alert(fileds.substring(0,fileds.length-1));
                 
                 $('#names').attr('value',names.substring(0,names.length-1));
                 $('#fileds').attr('value',fileds.substring(0,fileds.length-1));
                 
                 if($('#names').val()==''){
                 	alert('请在左边选择要导出的列');
                 	return;
                 }
                 
                 $('#form1').submit();
                 
        	}
        	
        </script>
	</head>

	<body>
	
<div id="search_left">
    <div class="search-top">综合查询</div>
    <div class="search-nav">
            <a id="sub02" class="menu" href="sys/check-in.html" target="frmright"><h3>签约信息</h3><i class="ico_menuarrow"></i></a>
            <ul class="i-sub02 nav-list">
                <li><label><input name="add_dept" value="报送单位" type="checkbox" onclick="addDelColum(this)"> 报送单位</label></li>
                <li><label><input name="qy_project_name" value="项目名称" type="checkbox" onclick="addDelColum(this)"> 项目名称</label></li>
                <li><label><input name="qy_build_content" value="建设内容" type="checkbox" onclick="addDelColum(this)"> 建设内容</label></li>
                <li><label><input name="qy_local_investor" type="checkbox" value="本地投资方" onclick="addDelColum(this)"> 本地投资方</label></li>
                <li><label><input name="qy_outside_investor" type="checkbox" value="外来投资方" onclick="addDelColum(this)"> 外来投资方</label></li>
                <li><label><input name="qy_total_invest" type="checkbox" value="总投资额[亿元]" onclick="addDelColum(this)"> 总投资额[亿元]</label></li>
                <li><label><input name="qy_first_invest" type="checkbox" value="一期投资额[亿元]" onclick="addDelColum(this)"> 一期投资额[亿元]</label></li>
                <li><label><input name="qy_trade_type" type="checkbox" value="行业类别" onclick="addDelColum(this)"> 行业类别</label></li>
                <li><label><input name="qy_industry_category" type="checkbox" value="产业类别" onclick="addDelColum(this)"> 产业类别</label></li>
                <li><label><input name="qy_date" type="checkbox" value="签约时间" onclick="addDelColum(this)"> 签约时间</label></li>
                <li><label><input name="qy_remark" type="checkbox" value="签约备注" onclick="addDelColum(this)"> 签约备注</label></li>
            </ul>
            <a id="sub03" class="menu" href="sys/check-in.html" target="frmright"><h3>注册信息</h3><i class="ico_menuarrow"></i></a>
            <ul class="i-sub03 nav-list">
                <li><label><input name="zc_register_no" type="checkbox" value="工商注册号" onclick="addDelColum(this)"> 工商注册号</label></li>
                <li><label><input name="zc_hs_name" type="checkbox" value="在黄注册名称" onclick="addDelColum(this)"> 在黄注册名称</label></li>
                <li><label><input name="zc_capital" type="checkbox" value="注册资本[万元]" onclick="addDelColum(this)"> 注册资本[万元]</label></li>
                <li><label><input name="zc_legal_person" type="checkbox" value="法人代表" onclick="addDelColum(this)"> 法人代表</label></li>
                <li><label><input name="zc_operate_scope" type="checkbox" value="经营范围" onclick="addDelColum(this)"> 经营范围</label></li>
                <li><label><input name="zc_date" type="checkbox" value="注册时间" onclick="addDelColum(this)"> 注册时间</label></li>
                <li><label><input name="zc_local_shareholder" type="checkbox" value="本地股东" onclick="addDelColum(this)"> 本地股东</label></li>
                <li><label><input name="zc_outside_shareholder" type="checkbox" value="市外股东" onclick="addDelColum(this)"> 市外股东</label></li>
                <li><label><input name="zc_build_place" type="checkbox" value="建设地点[注明园区]" onclick="addDelColum(this)"> 建设地点[注明园区]</label></li>
                <li><label><input name="zc_user_land" type="checkbox" value="项目用地[亩]" onclick="addDelColum(this)"> 项目用地[亩]</label></li>
                <li><label><input name="zc_recommend_company" type="checkbox" value="项目引荐单位" onclick="addDelColum(this)"> 项目引荐单位</label></li>
                <li><label><input name="zc_industry_chain" type="checkbox" value="所属产业链" onclick="addDelColum(this)"> 所属产业链</label></li>
            </ul>
            <a id="sub04" class="menu" href="sys/check-in.html" target="frmright"><h3>开工信息</h3><i class="ico_menuarrow"></i></a>
            <ul class="i-sub04 nav-list">
                <li><label><input name="kg_local_invest" type="checkbox" value="本地投资额[亿元]" onclick="addDelColum(this)"> 本地投资额[亿元]</label></li>
                <li><label><input name="kg_outside_invest" type="checkbox" value="市外投资额[亿元]" onclick="addDelColum(this)"> 市外投资额[亿元]</label></li>
                <li><label><input name="kg_actual_in_invest" type="checkbox" value="投资方实际到资额[亿元]" onclick="addDelColum(this)"> 投资方实际到资额[亿元]</label></li>
                <li><label><input name="kg_date" type="checkbox" value="开工时间" onclick="addDelColum(this)"> 开工时间</label></li>
                <li><label><input name="kg_remark" type="checkbox" value="开工备注" onclick="addDelColum(this)"> 开工备注</label></li>
            </ul>
            <a id="sub05" class="menu" href="sys/check-in.html" target="frmright"><h3>投产信息</h3><i class="ico_menuarrow"></i></a>
            <ul class="i-sub05 nav-list">
                <li><label><input name="tc_accumulative_in_invest" type="checkbox" value="累计实际到资总额[亿元]" onclick="addDelColum(this)"> 累计实际到资总额[亿元]</label></li>
                <li><label><input name="tc_date" type="checkbox" value="投产时间" onclick="addDelColum(this)"> 投产时间</label></li>
                <li><label><input name="tc_capacity" type="checkbox" value="已形成产能[万元]" onclick="addDelColum(this)"> 已形成产能[万元]</label></li>
                <li><label><input name="tc_month_sale_money" type="checkbox" value="月度销售收入[万元]" onclick="addDelColum(this)"> 月度销售收入[万元]</label></li>
                <li><label><input name="tc_remark" type="checkbox" value="投产备注" onclick="addDelColum(this)"> 投产备注</label></li>
            </ul>
    </div>
</div>
<div id="search_right">
    <div class="container-fluid">

    <div class="widget-box">
            <p class="widget-title">在谈信息</p>
            <div class="widget-box-body">
   <form id="form1" action="/grid_chi/index.php/Admin/Project/searchResult" method="post">
   	<input type="hidden" id="names" name="names" value="" />
   	<input type="hidden" id="fileds" name="fileds" value="" />
  
<table class="tabBox" width="100%">
	<tr>
		<td class="TDleft" >
		按项目状态查询：
		</td>
		<td>
		<select name="status">
			<option value="已签约">已签约</option>
			<option value="已注册">已注册</option>
			<option value="已开工">已开工</option>
			<option value="已投产">已投产</option>
		</select>
		审核状态:
		<select name="flag">
			<option value="">查询所有</option>
			<option value="审核中">审核中</option>
			<option value="审核通过">审核通过</option>
			<option value="审核未通过">审核未通过</option>
		</select>
		</td>
	</tr>	
	<tr>
		<td class="TDleft" >
		按时间查询：
		</td>
		<td>
		时间:<input type="text" name="s_date" value=""  class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})"  />
		            至
		    <input type="text" name="e_date" value=""  class="Wdate"  onclick="WdatePicker({dateFmt:'yyyyMM'})"  /><br>
		</td>
	</tr>	
	<tr>
		<td class="TDleft" >
		按投资额：
		</td>
		<td>
		注册资本[万元]:<input type="number" name="s_zc_capital" value=""  />
		                                    至
		           <input type="number" name="e_zc_capital" value="" /><br>
		</td>
	</tr>	
	<tr>
		<td class="TDleft" >
		按产业链：
		</td>
		<td>
		<select name="zc_industry_chain">
			<option value="" <?php if(($mo["zc_industry_chain"]) == ""): ?>selected<?php endif; ?>>-查询所有-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "所属产业链"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["zc_industry_chain"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		</td>
	</tr>	
	<tr>
		<td class="TDleft" >
		按行业：
		</td>
		<td>
		<select name="trade">
			<option value="" <?php if(($mo["trade"]) == ""): ?>selected<?php endif; ?>>-查询所有-</option>
			   <?php if(is_array($_SESSION['zidianList'])): foreach($_SESSION['zidianList'] as $key=>$vo): if(($vo["kind"]) == "行业"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($mo["trade"]) == $vo["name"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
		</select>
		</td>
	</tr>	
	<tr>
		<td class="TDleft" >
		按县市区：
		</td>
		<td>
		<select id="add_dept" name="add_dept">
							<option value="" <?php if(($add_dept) == ""): ?>selected<?php endif; ?> >-查询所有-</option>
							<option value="开发区" <?php if(($add_dept) == "开发区"): ?>selected<?php endif; ?> >开发区</option>
							<option value="大冶市" <?php if(($add_dept) == "大冶市"): ?>selected<?php endif; ?> >大冶市</option>
							<option value="阳新县" <?php if(($add_dept) == "阳新县"): ?>selected<?php endif; ?> >阳新县</option>
							<option value="黄石港区" <?php if(($add_dept) == "黄石港区"): ?>selected<?php endif; ?> >黄石港区</option>
							<option value="西塞山区" <?php if(($add_dept) == "西塞山区"): ?>selected<?php endif; ?> >西塞山区</option>
							<option value="下陆区" <?php if(($add_dept) == "下陆区"): ?>selected<?php endif; ?> >下陆区</option>
							<option value="铁山区" <?php if(($add_dept) == "铁山区"): ?>selected<?php endif; ?> >铁山区</option>
							<option value="市经信委" <?php if(($add_dept) == "市经信委"): ?>selected<?php endif; ?> >市经信委</option>
							<option value="市国资委" <?php if(($add_dept) == "市国资委"): ?>selected<?php endif; ?> >市国资委</option>
							<option value="市科技局" <?php if(($add_dept) == "市科技局"): ?>selected<?php endif; ?> >市科技局</option>
							<option value="市财政局" <?php if(($add_dept) == "市财政局"): ?>selected<?php endif; ?> >市财政局</option>
							<option value="市商务委" <?php if(($add_dept) == "市商务委"): ?>selected<?php endif; ?> >市商务委</option>
							<option value="市委统战部" <?php if(($add_dept) == "市委统战部"): ?>selected<?php endif; ?> >市委统战部</option>
							<option value="市卫计委" <?php if(($add_dept) == "市卫计委"): ?>selected<?php endif; ?> >市卫计委</option>
							<option value="市食药监局" <?php if(($add_dept) == "市食药监局"): ?>selected<?php endif; ?> >市食药监局</option>
							<option value="市商务委" <?php if(($add_dept) == "市商务委"): ?>selected<?php endif; ?> >市商务委</option>
							<option value="市房产局" <?php if(($add_dept) == "市房产局"): ?>selected<?php endif; ?> >市房产局</option>
							<option value="市发改委" <?php if(($add_dept) == "市发改委"): ?>selected<?php endif; ?> >市发改委</option>
							<option value="市台办" <?php if(($add_dept) == "市台办"): ?>selected<?php endif; ?> >市台办</option>
							<!-- <?php if(is_array($_SESSION['deptList'])): foreach($_SESSION['deptList'] as $key=>$vo): ?><option value="<?php echo ($vo["dept"]); ?>" <?php if(($add_dept) == $vo["dept"]): ?>selected<?php endif; ?> ><?php echo ($vo["dept"]); ?></option><?php endforeach; endif; ?> -->
						</select>
		</td>
	</tr>	
	<tr>
		<td class="TDleft" >
		
		</td>
		<td>
		<input type="button" name="" value="查询" onclick="submitForm()" />
		
		</td>
	</tr>	

</table>
</form>


        <div class="block-tab" style="margin:1px 0 0 0;">
            <table class="table-mins">
              <thead>
                <tr id="fr_head">
                  <!-- <th width="10"><input type="checkbox" name="checkbox" id="checkbox"></th> -->
                  <!-- <th>商品名称</th>
                  <th>SKU</th>
                  <th>类目</th>
                  <th>出厂价</th>
                  <th>零售价</th>
                  <th>库存警戒线</th>
                  <th>处理剩余库存</th>
                  <th>商品营销描述</th>
                  <th>操作</th> -->
                </tr>
              </thead>
              <tbody>
                <tr>
                  <!-- <td><input type="checkbox" name="checkbox" id="checkbox"></td>
                  <td>花边连衣裙</td>
                  <td>SADF12165465</td>
                  <td>服装</td>
                  <td>80</td>
                  <td>300</td>
                  <td>10</td>
                  <td>准许其它渠道</td>
                  <td><a href="add.html">添加</a></td>
                  <td><a href="#">删除</a></td> -->
                </tr>
              
              </tbody>
            </table>
            
        <div class="block-foot">
                <div class="pagination">
                   <?php echo ($page); ?>
                </div>
        </div>
        </div>
    </div>
</div>  

    </div>
</div>  

	</body>

</html>