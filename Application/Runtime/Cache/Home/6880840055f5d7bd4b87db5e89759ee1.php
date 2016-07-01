<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('HOME_TITLE');?></title>
<link href="/grid_swwyh/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_swwyh/Public/js/tab.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/jquery.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/grid_swwyh/Public/js/systemUtils.js"></script>
</head>

<script type="text/javascript">
	
	//刷新验证码
	function freshVerify(){
		$('#verifyImg').attr('src','/grid_swwyh/index.php/Home/Gzhd/verify?time='+Math.random());  
	}
	
	//保存数据
	function doSave(){
		
		var checked = checkForm('#form1');
	    if(checked==false){
		   return;
	    }
	
		var data=PublicAjax('/grid_swwyh/index.php/Home/Gzhd/insert',$('#form1').serialize());
		if(data.flag>0){
			var keynum=data.keynum;
			var selcode=data.selcode;
			alert('操作成功!您的来信编号是：'+keynum+',查询码是:'+selcode+';请牢记此信息，后续查询使用。谢谢合作!');
			location.reload();
		}else if(data.flag==-1){
			alert('验证码错误');
		}
		
	}
	
	//公众互动提交
	function gzhd(){
		location.href="/grid_swwyh/index.php/Home/Gzhd/gzhd?type=<?php echo ($type); ?>";
	}
	
	//公众互动列表
	function gzhdList(){
		location.href="/grid_swwyh/index.php/Home/Gzhd/gzhdList?type=<?php echo ($type); ?>";
	}
	
</script>

<body>
<div class="box_title">
       <p>　　欢迎使用&ldquo;<?php echo ($type); ?>&rdquo;系统，请将您的意见与建议填入以下表单，我们将在规定办理期限内答复。内容涉及法律责任将由用户承担，请注意所提供信息的真实性和准确性注：请认真填表格（带*项不能为空）</p>
     </div>
     <div class="nygzhd">
         <ul class="conTopA">
              <li class="normal" id="news02" onclick="gzhdList()">信件查询</li>
              <li class="active" id="news01" onclick="gzhd()">我要写信</li>
          </ul>
          <div class="conA">
             <div id="n01"> 
<div class="box_email_title"><h3><?php echo ($type); ?>-信件信息：（注意：带*的必填）</h3></div>
<div class="box_release">
	<form action="/grid_swwyh/index.php/Home/Gzhd/insert" method="post" id="form1">
		<input type="hidden" name="type" value="<?php echo ($type); ?>" />
    <table>
          <tr>
            <td class="TDleft"><span class="red">*</span> 姓    名：</td>
            <td colspan="3"> 
              <input type="text" name="name" id="name" want="yes" title="姓名" />
              </td>
          </tr>
          
          <?php if(($type) != "政务咨询"): ?><tr>
            <td class="TDleft"><span class="red">*</span> 电    话：</td>
            <td> 
              <input type="text" name="phone" id="phone" want="yes" title="电话" /></td>
            <td class="TDleft"><span class="red">*</span> 通讯地址：</td>
            <td> 
              <input type="text" name="address" id="address" want="yes" title="通讯地址"/>
             </td> 
          </tr><?php endif; ?>
          
          <tr>
            <td class="TDleft">邮    编：</td>
            <td> 
              <input type="text" name="zipcode" id="zipcode" require="false" datatype="Zip" msg="邮政编码不正确" /></td>
            <td class="TDleft">E - mail：</td>
            <td> 
              <input type="text" name="email" id="email" require="false" datatype="Email" msg="信箱格式不正确" /></td>
          </tr>
          <!-- <tr>
            <td class="TDleft"><span class="red">*</span> 写信目的：</td>
            <td colspan="3">
            	<label for="radio1"><input name="aim" id="radio1" type="radio" value="咨询" checked="checked" />咨询</label>
            	<label for="radio2"><input name="aim" id="radio2" type="radio" value="投诉" />投诉</label>
            	<label for="radio3"><input name="aim" id="radio3" type="radio" value="建议" />建议</label>
            	<label for="radio4"><input name="aim" id="radio4" type="radio" value="表扬" />表扬</label>
              </td>
          </tr> -->
          <tr>
            <td class="TDleft"><span class="red">*</span> 信件标题：</td>
            <td colspan="3"> 
              <input type="text" name="subject" id="subject" size="78" want="yes" title="信件标题" />
              </td>
          </tr>
          <tr>
            <td class="TDleft"><span class="red">*</span> 正    文：</td>
            <td colspan="3"> 
              <textarea name="content" id="content" cols="80" rows="8" want="yes" title="正文"></textarea>
              </td>
          </tr>
          <tr>
            <td class="TDleft">验 证 码：</td>
            <td colspan="3">
              <input name="validateCode" type="text" id="validateCode" want="yes" title="验证码" />
              <span class="red">*</span>
              <img style='cursor:pointer' title='刷新验证码' src='/grid_swwyh/index.php/Home/Gzhd/verify' id='verifyImg' onClick='freshVerify()'/>
              </td>
          </tr>
          <tr>
            <td align="center" colspan="4">
                <input type="button" id="submit" value="提交信息" onclick="doSave();" class="button" />
              
              <input type="reset" name="button2" id="reset" value="重新填写" class="button" /></td>
          </tr>
      </table>
      </form>
</div>
            </div>
             
</body>
</html>