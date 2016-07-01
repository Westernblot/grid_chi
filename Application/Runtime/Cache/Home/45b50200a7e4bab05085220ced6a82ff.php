<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('HOME_TITLE');?></title>
<link href="/grid_swwyh/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_swwyh/Public/js/jquery.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/systemUtils.js"></script>
</head>

<script type="text/javascript">

function showYsq_type_table(type)
{
  if(type == 0){
    $("#Ysq_type_table_fr").hide();
    $("#Ysq_type_table_gm").show();
    
    $('#form1 #name').attr('want','yes');
    $('#form1 #orgcode').attr('want','no');
    $('#form1 #licensecode').attr('want','no');
    
  }else{
    $("#Ysq_type_table_gm").hide();
    $("#Ysq_type_table_fr").show();
    
     $('#form1 #name').attr('want','no');
    $('#form1 #orgcode').attr('want','yes');
    $('#form1 #licensecode').attr('want','yes');
    
  }  
}


//保存数据
	function doSave(){
		
		var checked = checkForm('#form1');
	    if(checked==false){
		   return;
	    }
	
		var data=PublicAjax('/grid_swwyh/index.php/Home/Ysqgk/insert',$('#form1').serialize());
		if(data.flag>0){
			var keynum=data.keynum;
			var selcode=data.selcode;
			alert('操作成功!您的申请单编号是：'+keynum+',查询密码是:'+selcode+';请牢记此信息，后续查询使用。谢谢合作!');
			location.reload();
		}else {
			alert('操作失败!');
		}
		
	}

//查询
function doSearch(){
	var checked = checkForm('#formQuery');
	if(checked==false){
		return;
	}
	$('#formQuery').submit();
}

</script>

<body>
<div class="right_top"><div class="rtop_inner"><h3>依申请公开</h3></div></div>

<div class="yishenqinggk" id="ysq_info">
      <form method="get" action="/grid_swwyh/index.php/Home/Ysqgk/select" id="formQuery">
      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="background: #EEE;margin: 10px auto;">
                <tbody><tr>
                  <td width="80" height="26" align="right"><font color="red">*</font>申请单编码：</td>
                  <td width="175"><input type="text" id="keynum" name="keynum" value="" want="yes" title="申请单编号" class="input_text"></td>
                  <td width="80" align="right"><font color="red">*</font>查询密码：</td>
                  <td width="175"><input type="text" id="selcode" name="selcode" want="yes" title="查询密码" class="input_text"></td>
                  <td width="40" align="left"><input type="button" value="查询" onclick="doSearch()"></td>
                </tr>       
              </tbody>
    </table>
            </form>
    <form id="form1" name="form1" method="post" action="" target="submitFrame">
    <div class="shengqingTitle">
    申请人信息
    </div>
    
    <table class="shenqingTable" id="" border="0" cellpadding="0" cellspacing="0">
      <tbody><tr>
        <td>
    <ul>
        <li ><label><input id="persontype1" onclick="showYsq_type_table(0)" name="persontype" type="radio" value="公民" checked="true" class="input_radio">公民</label></li>
        <li ><label><input id="persontype2" onclick="showYsq_type_table(1)" name="persontype" type="radio" value="法人或者其他组织" class="input_radio">法人或者其他组织</label></li>  
    </ul>
            </td>
      </tr>
    </tbody></table>
    <span class="blank3"></span> 
    <table class="shenqingTable" id="" border="0" cellpadding="0" cellspacing="0">
      <tbody id="Ysq_type_table_gm">
            <tr>
                <th><span class="f_red">*</span>姓名：</th>
                <td><input type="text" id="name" name="name" value="" want="yes" title="姓名" class="input_text_w input_text"><div class="cError"></div></td>
                <th>工作单位：</th>
                <td><input type="text" id="workunit" name="workunit" value="" class="input_text_w input_text"></td>        
            </tr>
            <tr>
                <th>证件名称：</th>
                <td>
                  <select id="cardtype" name="cardtype" class="input_select_w input_select">
                      <option value="身份证">身份证</option>
                        <option value="军官证">军官证</option>
                        <option value="学生证">学生证</option>
                        <option value="工作证">工作证</option>
                    </select>
                </td>
                <th>证件号码：</th>
                <td><input type="text" id="cardnum" name="cardnum" value="" class="input_text_w input_text"></td>
            </tr>       
        </tbody>
        <tbody id="Ysq_type_table_fr" class="hidden">
             <tr>
                <th><nobr><span class="f_red">*</span>组织机构代码：</nobr></th>
                <td><input type="text" id="orgcode" name="orgcode" value="" want="no" title="组织机构代码" class="input_text_w input_text"></td>
                <th><nobr><span class="f_red">*</span>营业执照代码：</nobr></th>
                <td><input type="text" id="licensecode" name="licensecode" value="" want="no" title="营业执照代码" class="input_text_w input_text"></td>
            </tr> 
            <tr>
                <th>法人代表：</th>
                <td><input type="text" id="legalperson" name="legalperson" value="" class="input_text_w input_text"></td>
                <th>联系人：</th>
                <td><input type="text" id="linkperson" name="linkperson" value="" class="input_text_w input_text"></td>    
            </tr>         
        </tbody>
        <tbody>          
            <tr>
                <th><nobr><span class="f_red">*</span>联系电话：</nobr></th>
                <td><input type="text" id="tel" name="tel" value="" want="yes" title="联系电话" class="input_text_w input_text"><div class="cError"></div></td>
                <th><nobr>联系传真：</nobr></th>
                <td><input type="text" id="fax" name="fax" value="" class="input_text_w input_text"></td>          
            </tr>
            <tr>
                <th>手机号码：</th>
                <td><input type="text" id="phone" name="phone" value="" class="input_text_w input_text">
                </td>
                <th>电子邮箱：</th>
                <td><input type="text" id="email" name="email" value="" class="input_text_w input_text"></td>
            </tr> 
            <tr>
               <th><span class="f_red">*</span>通讯地址：</th>
                <td><input id="address" name="address" type="text" maxlength="30" value="" want="yes" title="通讯地址" class="input_text_w input_text"><div class="cError"></div></td>    
                <th>邮政编码：</th>
                <td><input type="text" id="zipcode" name="zipcode" value="" class="input_text_w input_text">
                </td>
            </tr>        
        </tbody>
    </table>  
    
    <div class="shengqingTitle">
    所需信息情况
    </div>
    
    <table id="" class="shenqingTable" border="0" cellpadding="0" cellspacing="0">
        <tbody>          
           <tr>
                <th><nobr>所需信息内容描述：</nobr></th>
                <td>
                    <textarea id="content" name="content" style="width:510px;height:80px;" class="input_textarea"></textarea>
                </td>
            </tr>
            <tr>
                <th><nobr>所需信息的索引号：</nobr></th>
                <td><input id="indexnum" name="indexnum" type="text" class="input_text_w input_text" maxlength="20" value=""><div class="cError"></div></td>
            </tr>
            <tr>
                <th>用途描述：</th>
                <td>
                 <textarea id="description" name="description" style="width:510px;height:80px;" cols="60" rows="10" class="input_textarea"></textarea>
                </td>
            </tr>
            <tr>
                <th><nobr>是否申请减免费用：</nobr></th>
                <td>
                    <input id="cut1" name="cut" type="radio" value="是" class="input_radio"><label for="e">是</label>　　
                    <input id="cut2" name="cut" type="radio" value="否" checked="true" class="input_radio"><label for="f">否</label>
                </td>        
            </tr>      
            <tr>
                <th><nobr>信息的指定提供方式：</nobr></th>
                <td>
                <input id="offerway1" name="offerway[]" type="checkbox" value="纸质" checked="true" class="input_checkbox"><label for="e">纸质</label>　　
                <input id="offerway2" name="offerway[]" type="checkbox" value="电子邮件" class="input_checkbox"><label for="e">电子邮件</label>　　
                <input id="offerway3" name="offerway[]" type="checkbox" value="光盘" class="input_checkbox"><label for="e">光盘</label>　　
                <input id="offerway4" name="offerway[]" type="checkbox" value="磁盘" class="input_checkbox"><label for="e">磁盘</label>
                </td>
            </tr>      
            <tr>
                <th><nobr>获取信息方式：</nobr></th>
                <td>
                <input id="getway1" name="getway[]" type="checkbox" value="电子邮件" checked="true" class="input_checkbox"><label for="e">电子邮件</label>　　
                <input id="getway2" name="getway[]" type="checkbox" value="邮寄" class="input_checkbox"><label for="e">邮寄</label>　　
                <input id="getway3" name="getway[]" type="checkbox" value="传真" class="input_checkbox"><label for="e">传真</label>　　
                <input id="getway4" name="getway[]" type="checkbox" value="自行领取" class="input_checkbox"><label for="e">自行领取</label>
                </td>
            </tr>      
            <tr>
                <th><nobr>是否接受其他方式：</nobr></th>
                <td>
                <input id="otherway1" name="otherway" type="radio" value="否" class="input_radio"><label for="e">否</label>　　
                <input id="otherway2" name="otherway" type="radio" value="是" checked="true" class="input_radio"><label for="f">是</label>
                </td>
            </tr>
        </tbody>
        </table>
    
    
    <span class="blank3"></span> 
    <table class="shenqingTable" id="" border="0" cellpadding="0" cellspacing="0">
      <tbody>
             <tr>
                <td style="text-align:center;">
                    <input type="button" id="btnOK" name="btnOK" class="button" value="提 交" onclick="doSave()">      
                    <input type="reset" id="btn2" name="btn2" class="button" onclick="" value="取消">
                </td>
            </tr>
        </tbody>
    </table>
    </form>
   </div>

</body>
</html>