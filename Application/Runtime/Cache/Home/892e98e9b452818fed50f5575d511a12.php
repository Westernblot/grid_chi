<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>黄石市林业局</title>
<link href="/grid_lyj/Public/css/Lpublic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_lyj/Public/js/jquery.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/systemUtils.js"></script>
</head>

<script type="text/javascript">

function subVeto(){
	
	// var s=$('#form1').serialize();
// 	
	// alert(s);
	
	var chk='0';
	//多选
	$('input[type="checkbox"]').each(function(index,obj){
       var ss=$(obj).val();
       if($(obj).attr('checked')){
       	chk+=","+$(obj).val();
       }
    });
	
	//单选
	$('input[type="radio"]').each(function(index,obj){
       var ss=$(obj).val();
       if($(obj).attr('checked')){
       	chk+=","+$(obj).val();
       }
    });
    
	alert(chk);
	
}

</script>

<body>
 <div class="nymain_title"><h3>网上调查</h3></div>
 <div class="wsdc_vote">
     <h3><?php echo ($wsdc["subject"]); ?></h3>
     
     <form id="form1" method="post">
     	
    <?php if(is_array($baseList)): foreach($baseList as $bk=>$base): ?><span><?php echo ($bk+1); ?>、<?php echo ($base["name"]); ?></span>
    
        <p>
    	<?php if(is_array($subList)): foreach($subList as $sk=>$sub): if(($sub["pid"]) == $base["id"]): if(($base["op"]) == "单选"): ?><input  name="answer_<?php echo ($bk); ?>" type="radio" value="<?php echo ($sub["id"]); ?>" />
                      <?php echo ($sub["content"]); ?><br/><?php endif; ?>	
    			<?php if(($base["op"]) == "多选"): ?><input  name="answer" type="checkbox" value="<?php echo ($sub["id"]); ?>" />
                      <?php echo ($sub["content"]); ?><br/><?php endif; endif; endforeach; endif; ?>
        </p><?php endforeach; endif; ?>
     
     </form>
     
     <!-- <span>1、您对黄石市高标准基本农田建设工作有何建议？</span>
     <p><textarea name="txtAdvice" id="txtAdvice" cols="60" rows="6"></textarea></p>
     
     <span>1、你平时关注地质灾害防治相关信息吗？</span>
 <p><input id="Answer_0" name="Answer_0" type="radio" value="023a5ab3-8056-491f-80d0-8f688214f9bc_A" />
   关注，关系社会稳定和人民生命财产安全<br/>
   <input id="Answer_0" name="Answer_0" type="radio" value="43b07512-1991-4989-b3e4-38e2aa7dd26b_B" />
   不关注，和我关系不大
   </p>
   
<span>2、你一般通过什么途径了解地质灾害防治知识？</span>
 <p><input type="checkbox" value="21bd07f1-e00e-4824-bca0-2df6b3e6d4c1_A" name="Answer_1" />
   电视、电台、报纸和网站的新闻和信息<br/>
   <input type="checkbox" value="88d4d94f-d6cb-4a4a-9727-6bc8133dea7f_B" name="Answer_1" />
   国土部门网站<br/>
   <input type="checkbox" value="7c969acb-9799-4c58-a0cc-00e0ddd67572_C" name="Answer_1" />
   4.22地球日、5.12防灾减灾日等的宣传<br/>
   <input type="checkbox" value="3ac68adf-8ea3-4e0a-8dc2-850b34e94560_D" name="Answer_1" />
   所在地基层国土所的宣传
   </p>
<span>3、当你发现突发地质灾害会怎么做？</span>
 <p><input type="checkbox" value="ab54f307-0999-407b-b63f-c14a9f41fdc9_A" name="Answer_2" />
   电话通知新闻媒体<br/>
   <input type="checkbox" value="4ea7aec0-6b1e-4731-8693-3c9ae0c4a268_B" name="Answer_2" />
   通过电话向国土部门报告情况<br/>
   <input type="checkbox" value="4a8a9343-1296-498f-9431-a5cf1ba507da_C" name="Answer_2" />
   向110求助<br/>
   <input type="checkbox" value="35df0569-e7dc-41cd-81e1-bd2ca6f8390e_D" name="Answer_2" />
   和我关系不大，什么也不做
   </p>
<span>4、你了解的地质灾害有哪几种类型？</span>
 <p><input type="checkbox" value="69ba7cf1-163b-4985-8087-14193d5ca3db_A" name="Answer_3" />
   滑坡<br/>
   <input type="checkbox" value="2839fcf3-46f2-4d1c-8fc4-1fd2d4644d25_B" name="Answer_3" />
   崩塌<br/>
   <input type="checkbox" value="c9dc40cc-10b9-4f24-978c-b009b50b85c5_C" name="Answer_3" />
   地面塌陷<br/>
   <input type="checkbox" value="bd447e00-02c4-4e8e-a064-85619d4a8daf_D" name="Answer_3" />
   泥石流<br/>
   <input type="checkbox" value="52a468e8-ca79-4ed9-905f-ffb00a01606e_E" name="Answer_3" />
   地裂缝<br/>
   <input type="checkbox" value="8b126c30-88a6-4452-8dfd-347d7ea4c9a2_F" name="Answer_3" />
   F、 地面沉降
   </p>
<span>5、哪些人类活动可能诱发滑坡、崩塌？</span>
 <p><input type="checkbox" value="b2ece582-9003-4103-9021-1f93d7e1570c_A" name="Answer_4" />
   盖房、修路开挖边坡<br/>
   <input type="checkbox" value="45859e98-fb6f-4b73-b133-0af8fafcad71_B" name="Answer_4" />
   露天采掘矿石<br/>
   <input type="checkbox" value="335d23b9-d024-4975-8e15-aa288c36b4b2_C" name="Answer_4" />
   水库蓄水和渠道渗漏<br/>
   <input type="checkbox" value="3021f3a2-ecf7-474e-9c96-9a30b60507b5_D" name="Answer_4" />
   乱堆放渣石、弃土<br/>
   <input type="checkbox" value="82127b83-c49b-4857-8005-18e2ff336e5f_E" name="Answer_4" />
   强烈的机械振动或人工爆破
   </p>
<span>6、你希望通过哪些途径获得地质灾害防灾避险常识？</span>
 <p><input type="checkbox" value="ffd2bc70-f8dc-4c1c-b0c1-bf1ec7ba3445_A" name="Answer_5" />
   宣传册<br/>
   <input type="checkbox" value="114952bf-e289-4616-8d7d-e5bcac981ab2_B" name="Answer_5" />
   社区公益讲座<br/>
   <input type="checkbox" value="74d43924-d2e7-4e5c-bcde-9f0890fc7eee_C" name="Answer_5" />
   国土部门网站专栏<br/>
   <input type="checkbox" value="f1f7d5bd-638b-419b-8ff4-b1a322ece89f_D" name="Answer_5" />
   电视、电台、报纸的新闻及信息<br/>
   <input type="checkbox" value="d7d8022c-c520-46ec-8026-9c62bd2e0654_E" name="Answer_5" />
   其他途径
   </p>
<span>7、你所了解的我市汛期地质灾害防治措施有哪些？</span>
 <p><input type="checkbox" value="fecfaa52-af70-4b59-b74e-4cfd3508d26b_A" name="Answer_6" />
   在地质灾害隐患点、危险点附近设立警示牌<br/>
   <input type="checkbox" value="2ef25ffc-27e0-484e-9ad1-29d221ad56b0_B" name="Answer_6" />
   向地质灾害隐患点、危险点周围群众发放避险明白卡、防灾明白卡<br/>
   <input type="checkbox" value="8e5e9375-eaf1-4d93-8f43-d0a69df0ba6d_C" name="Answer_6" />
   及时在市国土局网站首页无锡市地质灾害气象预警预报专栏更新最新信息<br/>
   <input type="checkbox" value="a992ac8a-2260-4a54-bb82-1c509fea6cec_D" name="Answer_6" />
   建立地质灾害群测群防网络，组织专人对地灾隐患点、危险点进行巡查监测<br/>
   <input type="checkbox" value="3565ef41-604f-45bb-87aa-d7edbd0ec214_E" name="Answer_6" />
   不太了解
   </p> -->
     
     <div style="text-align:center;">
        <input type="button" id="submit" value="提交信息" onclick="subVeto();" class="button" />
         <a href="/grid_lyj/index.php/Home/Wsdc/wsdcShow?id=<?php echo ($wsdc["id"]); ?>" class="button">查看结果</a>
      </div>
      </div>

</body>
</html>