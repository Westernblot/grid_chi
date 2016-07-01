<?php

//检查验证码是否输入正确
function check_verify($code, $id = '') {
	$verify = new \Think\Verify();
	return $verify -> check($code, $id);
}

//发送邮件提醒
function sendMail($to, $subject, $content) {
	Vendor('PHPMailer.PHPMailerAutoload');
	$mail = new PHPMailer();
	//实例化
	$mail -> IsSMTP();
	// 启用SMTP
	$mail -> Host = C('MAIL_HOST');
	//smtp服务器的名称（这里以126邮箱为例）
	$mail -> SMTPAuth = C('MAIL_SMTPAUTH');
	//启用smtp认证
	$mail -> Username = C('MAIL_USERNAME');
	//你的邮箱名
	$mail -> Password = C('MAIL_PASSWORD');
	//邮箱密码
	$mail -> From = C('MAIL_FROM');
	//发件人地址（也就是你的邮箱地址）
	$mail -> FromName = C('MAIL_FROMNAME');
	//发件人姓名
	$mail -> AddAddress($to, "name");
	$mail -> WordWrap = 50;
	//设置每行字符长度
	$mail -> IsHTML(C('MAIL_ISHTML'));
	// 是否HTML格式邮件
	$mail -> CharSet = C('MAIL_CHARSET');
	//设置邮件编码
	$mail -> Subject = $subject;
	//邮件主题
	$mail -> Body = $content;
	//邮件内容
	$mail -> AltBody = "This is the body in plain text for non-HTML mail clients";
	//邮件正文不支持HTML的备用显示

	//$flag=$mail->send();

	return $mail -> Send() ? 'Message has been sent' : $mail -> ErrorInfo;

	// if (!$mail -> Send()) {
	// echo "Message could not be sent. <p>";
	// echo "Mailer Error: " . $mail -> ErrorInfo;
	// exit();
	// } else {
	// echo "Message has been sent";
	// }

}

/**
 * excel 数据导出处理类,注册、开工、投产重点项目导出
 */
function exportExcel($xlsName, $xlsCell, $xlsData) {
	//$xlsTitle = iconv('utf-8', 'gb2312', $xlsName);
	//导出文件的名称
	$fileName = date('_YmdHis');
	//or $xlsTitle 文件名称可根据自己情况设定
	$cellNum = count($xlsCell);
	$dataNum = count($xlsData);
	Vendor("PHPExcel.PHPExcel");

	$objPHPExcel = new \PHPExcel();
	$cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

	//设置统一宽度
	for ($i = 0; $i < $cellNum; $i++) {
		if($i==1){
			$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(5);
		}else{
		   $objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(10);
		}
	}

	//set width
	// $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);  //单位
	$objPHPExcel -> getActiveSheet() -> getRowDimension('1') -> setRowHeight(30);

	$objPHPExcel -> getActiveSheet() -> getRowDimension('2') -> setRowHeight(30);

	//set font size bold
	$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setSize(20);
	//$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setBold(true);

	$objPHPExcel -> getActiveSheet() -> getDefaultStyle() -> getFont() -> setSize(10);
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getFont() -> setBold(true);

	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getAlignment() -> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:' . $cellName[$cellNum - 1] . '2') -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	//边框显示
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

	//设置水平居中
	//$objPHPExcel->getActiveSheet()->getStyle('A1:Q2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
	$objPHPExcel -> getActiveSheet() -> getStyle('A:' . $cellName[$cellNum - 1] . '') -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	// $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	//  $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	///  $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	// $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	// $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	// $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//合并单元格,并赋值
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A1:' . $cellName[$cellNum - 1] . '1');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A1', $xlsName);

	//标题头部
	for ($i = 0; $i < $cellNum; $i++) {
		$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($cellName[$i] . '2', $xlsCell[$i][1]);
	}
	// 内容，Miscellaneous glyphs, UTF-8
	for ($i = 0; $i < $dataNum; $i++) {
		for ($j = 0; $j < $cellNum; $j++) {
			//设置边框样式
			$objPHPExcel -> getActiveSheet() -> getRowDimension($i + 3) -> setRowHeight(30);
			$objPHPExcel -> getActiveSheet() -> getStyle($cellName[$j] . ($i + 3)) -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit($cellName[$j] . ($i + 3), $xlsData[$i][$xlsCell[$j][0]], PHPExcel_Cell_DataType::TYPE_STRING);
		}
	}

	header('pragma:public');
	header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsName . '.xls"');
	header("Content-Disposition:attachment;filename=$fileName.xls");
	//attachment新窗口打印inline本窗口打印
	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter -> save('php://output');
	exit ;
}


/**
 * excel 数据导出处理类,注册、开工、投产重点项目导出
 */
function xylfjExportExcel($xlsName, $xlsCell, $xlsData) {
	//$xlsTitle = iconv('utf-8', 'gb2312', $xlsName);
	//导出文件的名称
	$fileName = date('_YmdHis');
	//or $xlsTitle 文件名称可根据自己情况设定
	$cellNum = count($xlsCell);
	$dataNum = count($xlsData);
	Vendor("PHPExcel.PHPExcel");

	$objPHPExcel = new \PHPExcel();
	$cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

	//设置统一宽度
	for ($i = 0; $i < $cellNum; $i++) {
		if($i==0){
		    $objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(5);
		}else{			
		    $objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(10);
		}
	}

	//set width
	// $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);  //单位
	$objPHPExcel -> getActiveSheet() -> getRowDimension('1') -> setRowHeight(30);

	$objPHPExcel -> getActiveSheet() -> getRowDimension('2') -> setRowHeight(30);

	//set font size bold
	$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setSize(20);
	//$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setBold(true);

	$objPHPExcel -> getActiveSheet() -> getDefaultStyle() -> getFont() -> setSize(10);
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getFont() -> setBold(true);

	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getAlignment() -> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:' . $cellName[$cellNum - 1] . '2') -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	//边框显示
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

	//设置水平居中
	//$objPHPExcel->getActiveSheet()->getStyle('A1:Q2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
	$objPHPExcel -> getActiveSheet() -> getStyle('A:' . $cellName[$cellNum - 1] . '') -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	// $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	//  $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	///  $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	// $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	// $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	// $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//合并单元格,并赋值
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A1:' . $cellName[$cellNum - 1] . '1');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A1', $xlsName);

	//标题头部
	for ($i = 0; $i < $cellNum; $i++) {
		$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($cellName[$i] . '2', $xlsCell[$i][1]);
	}
	// 内容，Miscellaneous glyphs, UTF-8
	for ($i = 0; $i < $dataNum; $i++) {
		for ($j = 0; $j < $cellNum; $j++) {
			//设置边框样式
			$objPHPExcel -> getActiveSheet() -> getRowDimension($i + 3) -> setRowHeight(30);
			$objPHPExcel -> getActiveSheet() -> getStyle($cellName[$j] . ($i + 3)) -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit($cellName[$j] . ($i + 3), $xlsData[$i][$xlsCell[$j][0]], PHPExcel_Cell_DataType::TYPE_STRING);
		}
	}

	header('pragma:public');
	header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsName . '.xls"');
	header("Content-Disposition:attachment;filename=$fileName.xls");
	//attachment新窗口打印inline本窗口打印
	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter -> save('php://output');
	exit ;
}


/**
 * 根据日期获取星期
 */
function getWeekByMonth($week = '') {

	switch ($week) {
		case '0' :
			$week = '周日';
			break;

		case '1' :
			$week = '周一';
			break;

		case '2' :
			$week = '周二';
			break;

		case '3' :
			$week = '周三';
			break;

		case '4' :
			$week = '周四';
			break;

		case '5' :
			$week = '周五';
			break;

		case '6' :
			$week = '周六';
			break;

		default :
			break;
	}

	return $week;

}

function subtext($text, $length) {
	if (mb_strlen($text, 'utf8') > $length) {
		return mb_substr($text, 0, $length, 'utf8') . '...';
	}
	return $text;
}

/**
 * 判断是否为移动设备
 */
function isMobile() {

	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
		return true;
	}
	// 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset($_SERVER['HTTP_VIA'])) {
		// 找不到为flase,否则为true
		return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
	}
	// 脑残法，判断手机发送的客户端标志,兼容性有待提高
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile');
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
			return true;
		}
	}
	// 协议法，因为有可能不准确，放到最后判断
	if (isset($_SERVER['HTTP_ACCEPT'])) {
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
			return true;
		}
	}
	return false;

}

//判断是否微信
function isWeixin() {
	$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	$is_weixin = strpos($agent, 'micromessenger') ? true : false;
	if ($is_weixin) {
		return true;
	} else {
		return false;
	}
}

//cURL库抓网页,从一个链接上取数据(get方式)
function curl_get($url = '') {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

//cURL库抓网页,从一个链接上取数据(post方式)
function curl_post($url = '', $postdata = '') {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function fmIds($ids = '') {
	$ids = str_replace(",", "','", $ids);
	return "'" . $ids . "'";
}

//===============================================分隔线==================================================

/**
 * excel 驻外招商数据导出
 */
function excelOutside($xlsName, $xlsCell, $xlsData) {
	//$xlsTitle = iconv('utf-8', 'gb2312', $xlsName);
	//导出文件的名称
	$fileName = date('_YmdHis');
	//or $xlsTitle 文件名称可根据自己情况设定
	$cellNum = count($xlsCell);
	$dataNum = count($xlsData);
	Vendor("PHPExcel.PHPExcel");

	$objPHPExcel = new \PHPExcel();
	$cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

	//设置统一宽度
	for ($i = 0; $i < $cellNum; $i++) {
		if($i==1 || $i==6){
			$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(5);
		}else{
		    $objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(15);
		}
	}

	//设置第一行行高
	$objPHPExcel -> getActiveSheet() -> getRowDimension('1') -> setRowHeight(30);
	$objPHPExcel -> getActiveSheet() -> getRowDimension('2') -> setRowHeight(25);

	//设置字体大小，加粗
	$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setSize(20);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setBold(true);

	$objPHPExcel -> getActiveSheet() -> getDefaultStyle() -> getFont() -> setSize(10);
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getFont() -> setBold(true);

	//设置字体水平、垂直居中
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getAlignment() -> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:' . $cellName[$cellNum - 1] . '2') -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	//边框显示
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

	//设置水平居中
	//$objPHPExcel->getActiveSheet()->getStyle('A1:Q2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
	$objPHPExcel -> getActiveSheet() -> getStyle('A:' . $cellName[$cellNum - 1] . '') -> getAlignment() -> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A:' . $cellName[$cellNum - 1] . '') -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	//合并单元格,并赋值
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A1:' . $cellName[$cellNum - 1] . '1');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A1', $xlsName);

	//标题头部
	for ($i = 0; $i < $cellNum; $i++) {
		$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($cellName[$i] . '2', $xlsCell[$i][1]);
	}
	// 内容，Miscellaneous glyphs, UTF-8
	$j = 0;
	$add_dept = '';
	$countNum = 0;
	for ($i = 0; $i < $dataNum; $i++) {

		$visit_companyArr = explode(",", $xlsData[$i]['visit_company']);
		$vister_manArr = explode(",", $xlsData[$i]['vister_man']);
		$vister_man_positionArr = explode(",", $xlsData[$i]['vister_man_position']);

		$objPHPExcel -> getActiveSheet(0) -> mergeCells("A" . ($i + 3 + $j) . ":A" . ($i + 2 + $j + count($visit_companyArr)));
		$objPHPExcel -> getActiveSheet(0) -> mergeCells("C" . ($i + 3 + $j) . ":C" . ($i + 2 + $j + count($visit_companyArr)));
		$objPHPExcel -> getActiveSheet(0) -> mergeCells("D" . ($i + 3 + $j) . ":D" . ($i + 2 + $j + count($visit_companyArr)));
		$objPHPExcel -> getActiveSheet(0) -> mergeCells("E" . ($i + 3 + $j) . ":E" . ($i + 2 + $j + count($visit_companyArr)));
		$objPHPExcel -> getActiveSheet(0) -> mergeCells("F" . ($i + 3 + $j) . ":F" . ($i + 2 + $j + count($visit_companyArr)));
		$objPHPExcel -> getActiveSheet(0) -> mergeCells("G" . ($i + 3 + $j) . ":G" . ($i + 2 + $j + count($visit_companyArr)));
		$objPHPExcel -> getActiveSheet(0) -> mergeCells("H" . ($i + 3 + $j) . ":H" . ($i + 2 + $j + count($visit_companyArr)));

		for ($k = 0; $k < count($visit_companyArr); $k++) {

			//设置边框
			$objPHPExcel -> getActiveSheet() -> getStyle("A" . ($i + 3 + $j) . ":K" . ($i + 3 + $j)) -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

            $objPHPExcel -> getActiveSheet() -> getRowDimension($i + 3 + $j) -> setRowHeight(25);//设置行高
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('A' . ($i + 3 + $j), $xlsData[$i]['add_dept'], PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('B' . ($i + 3 + $j), $xlsData[$i]['no'], PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('C' . ($i + 3 + $j), $xlsData[$i]['name'], PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('D' . ($i + 3 + $j), $xlsData[$i]['position'], PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('E' . ($i + 3 + $j), $xlsData[$i]['sdate'], PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('F' . ($i + 3 + $j), $xlsData[$i]['edate'], PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('G' . ($i + 3 + $j), $xlsData[$i]['num'], PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('H' . ($i + 3 + $j), $xlsData[$i]['dest'], PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('I' . ($i + 3 + $j), $visit_companyArr[$k], PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('J' . ($i + 3 + $j), $vister_manArr[$k], PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('K' . ($i + 3 + $j), $vister_man_positionArr[$k], PHPExcel_Cell_DataType::TYPE_STRING);

			$j++;

		}

		$countNum = $countNum + $xlsData[$i]['num'];

		if ($xlsData[$i]['add_dept'] != $xlsData[$i +1]['add_dept']) {
			
			//合并单元格、设置边框
			$objPHPExcel -> getActiveSheet(0) -> mergeCells("A" . ($i + 3 + $j) . ":F" . ($i + 3 + $j));
			$objPHPExcel -> getActiveSheet() -> getStyle("A" . ($i + 3 + $j) . ":K" . ($i + 3 + $j)) -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
			$objPHPExcel -> getActiveSheet() -> getRowDimension($i + 3 + $j) -> setRowHeight(25);//设置行高
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('A' . ($i + 3 + $j), '小计', PHPExcel_Cell_DataType::TYPE_STRING);
			// $objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('B' . ($i + 3 + $j), '', PHPExcel_Cell_DataType::TYPE_STRING);
			// $objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('C' . ($i + 3 + $j), '', PHPExcel_Cell_DataType::TYPE_STRING);
			// $objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('D' . ($i + 3 + $j), '', PHPExcel_Cell_DataType::TYPE_STRING);
			// $objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('E' . ($i + 3 + $j), '', PHPExcel_Cell_DataType::TYPE_STRING);
			// $objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('F' . ($i + 3 + $j), '', PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('G' . ($i + 3 + $j), $countNum, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('H' . ($i + 3 + $j), '', PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('I' . ($i + 3 + $j), '', PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('J' . ($i + 3 + $j), '', PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit('K' . ($i + 3 + $j), '', PHPExcel_Cell_DataType::TYPE_STRING);
			
			$countNum = 0;
			
		} else {
			$j--;
	  	}

	}

	header('pragma:public');
	header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsName . '.xls"');
	header("Content-Disposition:attachment;filename=$fileName.xls");
	//attachment新窗口打印inline本窗口打印
	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter -> save('php://output');
	exit ;
}






/**
 * excel 自定义组合查询结果导出
 */
function fnExcelResult($xlsName, $namesArr,$filedsArr, $xlsData) {
	//$xlsTitle = iconv('utf-8', 'gb2312', $xlsName);
	//导出文件的名称
	$fileName = date('_YmdHis');
	//or $xlsTitle 文件名称可根据自己情况设定
	$cellNum = count($namesArr);
	$dataNum = count($xlsData);
	Vendor("PHPExcel.PHPExcel");

	$objPHPExcel = new \PHPExcel();
	$cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

	//设置统一宽度
	for ($i = 0; $i < $cellNum; $i++) {
		$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(20);
	}

	$objPHPExcel -> getActiveSheet() -> getRowDimension('1') -> setRowHeight(30);

	$objPHPExcel -> getActiveSheet() -> getRowDimension('2') -> setRowHeight(20);

	//set font size bold
	$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setSize(20);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setBold(true);

	$objPHPExcel -> getActiveSheet() -> getDefaultStyle() -> getFont() -> setSize(10);
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getFont() -> setBold(true);

	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getAlignment() -> setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:' . $cellName[$cellNum - 1] . '2') -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	//边框显示
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:' . $cellName[$cellNum - 1] . '2') -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

	//设置水平居中
	//$objPHPExcel->getActiveSheet()->getStyle('A1:Q2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
	$objPHPExcel -> getActiveSheet() -> getStyle('A:' . $cellName[$cellNum - 1] . '') -> getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	

	//合并单元格,并赋值
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A1:' . $cellName[$cellNum - 1] . '1');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A1', $xlsName);

	//标题头部
	for ($i = 0; $i < $cellNum; $i++) {
		$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($cellName[$i] . '2', $namesArr[$i]);
	}
	// 内容，Miscellaneous glyphs, UTF-8
	for ($i = 0; $i < $dataNum; $i++) {
		for ($j = 0; $j < $cellNum; $j++) {
			//设置边框样式
			$objPHPExcel -> getActiveSheet() -> getStyle($cellName[$j] . ($i + 3)) -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit($cellName[$j] . ($i + 3), $xlsData[$i][$filedsArr[$j]], PHPExcel_Cell_DataType::TYPE_STRING);
		}
	}

	header('pragma:public');
	header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsName . '.xls"');
	header("Content-Disposition:attachment;filename=$fileName.xls");
	//attachment新窗口打印inline本窗口打印
	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter -> save('php://output');
	exit ;
}




  /**
   * 2016年*月县（市）区（开发区）党政主职驻外招商进度汇总表
   */
  function doOutsideExcel($title,$monthArr,$addArr){
  	$fileName = date('_YmdHis');
	//or $xlsTitle 文件名称可根据自己情况设定

	Vendor("PHPExcel.PHPExcel");

	$objPHPExcel = new \PHPExcel();
	
	$cellName = array('A', 'B', 'C', 'D');

	//设置统一宽度
	for ($i = 0; $i < 4; $i++) {
		if($i==0){
			$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(10);
		}else if($i==1){
			$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(20);
		}else{	
		   $objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(30);
		}
	}
	
	//设置行高
	for($i=0;$i<13;$i++){
		if($i==0){
		   $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(50);
		   $objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setSize(15);
		}else{
	       $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(35);
		}
	}
	
	//设置水平、垂直居中
	$objPHPExcel->getActiveSheet()->getStyle('A1:D12')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel -> getActiveSheet() ->getStyle('A1:D12')->getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	

	//set font size bold
	//$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setSize(20);
	//$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setBold(true);
	
	//合并单元格A1:D1
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A1:D1');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A1',$title);
	
	
	//合并单元格A2:A4
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A2:A4');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B2:B4');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('C2:D2');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('C3:D3');
	
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A2','序号');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B2','责任单位');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C2','驻外招商情况');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C3','党政主职(天数)');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C4','本月');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D4','累计');
	
    
	//开始循环赋值
	 $deptArr = array('开发区','大冶市','阳新县','黄石港区','西塞山区','下陆区','铁山区');
    for($i = 0;$i < 7; $i++){
    	
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A'. ($i+5), $i + 1);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B'. ($i+5), $deptArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C'. ($i+5), $monthArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D'. ($i+5), $addArr[$i]);		 
		   //$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($cellName[$i] . '2', $namesArr[$i]);
	       //$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($cellName[$i] . ($i + 5),$deptArr[$i]);
	       //$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($cellName[$i] . ($i + 5),'');
	       //$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($cellName[$i] . ($i + 5),'');
    
    }
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A12:B12');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A12','合计');
	
	$objPHPExcel->getActiveSheet()->setCellValue('C12','=SUM(C5:C11)');
    $objPHPExcel->getActiveSheet()->setCellValue('D12','=SUM(D5:D11)');
	//$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C12',$monthArr[7]);
	//$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D12',$addArr[7]);
	
    	
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:D12') -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	
	header('pragma:public');
	header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsName . '.xls"');
	header("Content-Disposition:attachment;filename=$fileName.xls");
	//attachment新窗口打印inline本窗口打印
	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter -> save('php://output');
	exit ;
	
  }


   
   /**
    * 2016年*月县、市、区（开发区）招商引资工作目标进度汇总表
    */
    function doZsyjExcel($title,$zcArr,$kgArr,$tcArr){
    	$fileName = date('_YmdHis');
	//or $xlsTitle 文件名称可根据自己情况设定

	Vendor("PHPExcel.PHPExcel");

	$objPHPExcel = new \PHPExcel();
	
	$cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q');


	//设置统一宽度
	for ($i = 0; $i < count($cellName); $i++) {
		if($i==0){
			$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(10);
		}else if($i==1){
			$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(9);
		}else{	
		   $objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(9);
		}
	}
	
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:Q12') -> getFont() -> setSize(10);
	
	//设置行高
	for($i=0;$i<13;$i++){
         if($i==1){
           $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(30);
         }else if($i==4){
	       $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(80);
		}else{
	       $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(20);
		}
	}
	
	//设置水平、垂直居中
	$objPHPExcel->  getActiveSheet() -> getStyle('A1:Q12')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:Q12')->getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:Q12') -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	
	//合并单元格A1:D1
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A1:Q1');
	$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setSize(20);
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A1',$title);
	
	
	//合并单元格A2:A4
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A2:A4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A2','单位');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B2:B4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B2','类别');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('C2:E3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C2','新注册重点项目（个）');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('F2:H3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('F2','新开工重点项目（个）');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('I2:K3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('I2','新投产重点项目（个）');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('L2:Q2');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('L2','实际到位内资（亿元）');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('L3:N3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('L3','总额');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('O3:Q3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('O3','其中：省外资金');
	

	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C4','目标值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D4','完成值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('E4','完成进度%');
	
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('F4','目标值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('G4','完成值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('H4','完成进度%');
	
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('I4','目标值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('J4','完成值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('K4','完成进度%');
	
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('L4','目标值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('M4','完成值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('N4','完成进度%');
	
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('O4','目标值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('P4','完成值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('Q4','完成进度%');
	
	//合计
    $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A5','合计');
	$objPHPExcel->getActiveSheet()->setCellValue('D5','=SUM(D6:D12)');
    $objPHPExcel->getActiveSheet()->setCellValue('G5','=SUM(G6:G12)');
    $objPHPExcel->getActiveSheet()->setCellValue('J5','=SUM(J6:J12)');
	
	//开始循环赋值
	 $deptArr = array('开发区','大冶市','阳新县','黄石港区','西塞山区','下陆区','铁山区');
    for($i = 0;$i < 7; $i++){
    	
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A'. ($i+6), $deptArr[$i]);		 
    		 //$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B'. ($i+6), $deptArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D'. ($i+6), $zcArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('G'. ($i+6), $kgArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('J'. ($i+6), $tcArr[$i]);		 
		 
    
    }
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B6:B8');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B6','一类');
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B9:B12');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B9','二类');
	
	header('pragma:public');
	header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsName . '.xls"');
	header("Content-Disposition:attachment;filename=$fileName.xls");
	//attachment新窗口打印inline本窗口打印
	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter -> save('php://output');
	exit ;
	
    }

  
  /**
   * 2016年*月产业链招商分局工作目标情况汇总表
   */
    function doDestCollectExcel($title,$EArr,$FArr,$HArr,$IArr,$KArr,$LArr){
    	
			$fileName = date('_YmdHis');
	//or $xlsTitle 文件名称可根据自己情况设定

	Vendor("PHPExcel.PHPExcel");

	$objPHPExcel = new \PHPExcel();
	
	$cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M');


	//设置统一宽度
	for ($i = 0; $i < count($cellName); $i++) {
		if($i==0){
			$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(5);
		}else if($i==1){
			$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(28);
		}else{	
		   $objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(14);
		}
	}
	
	//设置字体
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:Q12') -> getFont() -> setSize(10);
	
	//设置行高
	for($i=0;$i<17;$i++){
         if($i==1){
           $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(30);
         }else if($i==3){
	       $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(30);
		}else{
	       $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(20);
		}
	}
	
	//设置水平、垂直居中
	$objPHPExcel->  getActiveSheet() -> getStyle('A1:M17')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:M17')->getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:M17') -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	
	//合并单元格A1:D1
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A1:M1');
	$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setSize(20);
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A1',$title);
	
	
	//合并单元格A2:A4
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A2:A4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A2','序号');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B2:B4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B2','产业链招商');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('C2:C4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C2','分局');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('D2:D4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D2','责任单位');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('E2:J2');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('E2','当年新注册重点项目（个数）');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('E3:G3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('E3','投资0.5亿元以上重点项目（个数）');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('H3:J3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('H3','投资1亿元以上重点项目（个数）');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('K2:M3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('K2','当年新开工重点 项目（个数）');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('E4','目标值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('F4','完成值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('G4','完成比例(100%)');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('H4','目标值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('I4','完成值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('J4','完成比例(100%)');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('K4','目标值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('L4','完成值');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('M4','完成比例(100%)');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A5:D5');
	//合计
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A5','合计：');
	$objPHPExcel->getActiveSheet()->setCellValue('E5','=SUM(E6:E17)');
	$objPHPExcel->getActiveSheet()->setCellValue('F5','=SUM(F6:F17)');
	$objPHPExcel->getActiveSheet()->setCellValue('H5','=SUM(H6:H17)');
	$objPHPExcel->getActiveSheet()->setCellValue('I5','=SUM(I6:I17)');
	$objPHPExcel->getActiveSheet()->setCellValue('K5','=SUM(K6:K17)');
	$objPHPExcel->getActiveSheet()->setCellValue('L5','=SUM(L6:L17)');
	
	//计算百分比
	$objPHPExcel->getActiveSheet()->setCellValue('G5','=TEXT(F5/E5,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J5','=TEXT(I5/H5,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M5','=TEXT(L5/K5,"0.0%")');
	
	
	//合并给值
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A6:A7');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A6','1');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B6:B7');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B6','高端装备制造及智能化模具产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C6','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C7','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D6','市经信委');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D7','市国资委');
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A8:A9');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A8','2');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B8:B9');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B8','特钢及汽车零部件产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C8','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C9','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D8','市科技局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D9','市财政局');
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A10:A11');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A10','3');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B10:B11');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B10','电子信息及新材料产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C10','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C11','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D10','市商务委(招商局)');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D11','市委统战部');
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A12:A13');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A12','4');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B12:B13');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B12','医药化工产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C12','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C13','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D12','市卫计委');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D13','市食药监局');
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A14:A15');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A14','5');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B14:B15');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B14','现代服务业产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C14','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C15','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D14','市商务委(招商局)');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D15','市房产局');
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A16:A17');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A16','6');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B16:B17');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B16','节能环保及资源回收利用产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C16','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C17','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D16','市发改委');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D17','市台办');
	
	
	//开始循环赋值
	//$EArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	//$FArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	//$HArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	//$IArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	//$KArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
	//$LArr = array('1','1','1','1','1','1','1','1','1','1','1','1');
    for($i = 0;$i < 12; $i++){
    	
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('E'. ($i+6), $EArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('F'. ($i+6), $FArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('H'. ($i+6), $EArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('I'. ($i+6), $FArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('K'. ($i+6), $EArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('L'. ($i+6), $FArr[$i]);		 

    }
	
	$objPHPExcel->getActiveSheet()->setCellValue('G6','=TEXT(F6/E6,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J6','=TEXT(I6/H6,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M6','=TEXT(L6/K6,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G7','=TEXT(F7/E7,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J7','=TEXT(I7/H7,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M7','=TEXT(L7/K7,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G8','=TEXT(F8/E8,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J8','=TEXT(I8/H8,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M8','=TEXT(L8/K8,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G9','=TEXT(F9/E9,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J9','=TEXT(I9/H9,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M9','=TEXT(L9/K9,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G10','=TEXT(F10/E10,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J10','=TEXT(I10/H10,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M10','=TEXT(L10/K10,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G11','=TEXT(F11/E11,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J11','=TEXT(I11/H11,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M11','=TEXT(L11/K11,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G12','=TEXT(F12/E12,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J12','=TEXT(I12/H12,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M12','=TEXT(L12/K12,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G13','=TEXT(F13/E13,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J13','=TEXT(I13/H13,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M13','=TEXT(L13/K13,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G14','=TEXT(F14/E14,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J14','=TEXT(I14/H14,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M14','=TEXT(L14/K14,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G15','=TEXT(F15/E15,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J15','=TEXT(I15/H15,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M15','=TEXT(L15/K15,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G16','=TEXT(F16/E16,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J16','=TEXT(I16/H16,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M16','=TEXT(L16/K16,"0.0%")');
	
	$objPHPExcel->getActiveSheet()->setCellValue('G17','=TEXT(F17/E17,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('J17','=TEXT(I17/H17,"0.0%")');
	$objPHPExcel->getActiveSheet()->setCellValue('M17','=TEXT(L17/K17,"0.0%")');
	
	
	header('pragma:public');
	header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsName . '.xls"');
	header("Content-Disposition:attachment;filename=$fileName.xls");
	//attachment新窗口打印inline本窗口打印
	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter -> save('php://output');
	exit ;
		
    }
    
	
	
	/**
	 * 2016年*月产业链招商分局驻外招商进度汇总表
	 */
	 function doCylOutsideCollect($title,$EArr,$FArr,$GArr,$HArr){
	 	
		
				$fileName = date('_YmdHis');
	//or $xlsTitle 文件名称可根据自己情况设定

	Vendor("PHPExcel.PHPExcel");

	$objPHPExcel = new \PHPExcel();
	
	$cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');


	//设置统一宽度
	for ($i = 0; $i < count($cellName); $i++) {
		if($i==0){
			$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(5);
		}else if($i==1){
			$objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(28);
		}else{	
		   $objPHPExcel -> getActiveSheet() -> getColumnDimension($cellName[$i]) -> setWidth(14);
		}
	}
	
	//设置字体
	$objPHPExcel -> getActiveSheet() -> getStyle('A2:H16') -> getFont() -> setSize(10);
	
	//设置行高
	for($i=0;$i<17;$i++){
         if($i==1){
           $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(30);
         }else if($i==3){
	       $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(30);
		}else{
	       $objPHPExcel -> getActiveSheet() -> getRowDimension($i) -> setRowHeight(20);
		}
	}
	
	//设置水平、垂直居中
	$objPHPExcel->  getActiveSheet() -> getStyle('A1:H16')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:H16')->getAlignment() -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel -> getActiveSheet() -> getStyle('A1:H16') -> getBorders() -> getAllBorders() -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	
	//合并单元格A1:D1
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A1:H1');
	$objPHPExcel -> getActiveSheet() -> getStyle('A1') -> getFont() -> setSize(20);
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A1',$title);
	
	
	//合并单元格A2:A4
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A2:A4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A2','序号');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B2:B4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B2','产业链招商');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('C2:C4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C2','分局');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('D2:D4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D2','责任单位');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('E2:H2');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('E2','驻外招商情况 ');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('E3:F3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('E3','第一责任人');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('G3:H3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('G3','分局局长');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('E4','本月');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('F4','累计');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('G4','本月');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('H4','累计');
	
	//合计
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A5:D5');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A5','合计：');
	$objPHPExcel->getActiveSheet()->setCellValue('E5','=SUM(E6:E16)');
	$objPHPExcel->getActiveSheet()->setCellValue('F5','=SUM(F6:F16)');
	$objPHPExcel->getActiveSheet()->setCellValue('G5','=SUM(G6:G16)');
	$objPHPExcel->getActiveSheet()->setCellValue('H5','=SUM(H6:H16)');

	//合并给值
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A6:A7');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B6:B7');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A6','1');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B6','高端装备制造及智能化模具产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C6','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C7','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D6','市经信委');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D7','市国资委');
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A8:A9');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B8:B9');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A8','2');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B8','特钢及汽车零部件产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C8','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C9','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D8','市科技局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D9','市财政局');
	

	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A10','3');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B10','电子信息及新材料产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C10','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D10','市委统战部');
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A11:A12');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B11:B12');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A11','4');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B11','医药化工产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C11','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C12','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D11','市卫计委');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D12','市食药监局');
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A13:A14');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B13:B14');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A13','5');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B13','现代服务业产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C13','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C14','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D13','市商务委(招商局)');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D14','市房产局');
	
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('A15:A16');
	$objPHPExcel -> getActiveSheet(0) -> mergeCells('B15:B16');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('A15','6');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('B15','节能环保及资源回收利用产业链');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C15','一分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('C16','二分局');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D15','市发改委');
	$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('D16','市台办');
	
	
	//开始循环赋值
	//$EArr = array('1','1','1','1','1','1','1','1','1','1','1');
	//$FArr = array('1','1','1','1','1','1','1','1','1','1','1');
	//$GArr = array('1','1','1','1','1','1','1','1','1','1','1');
	//$HArr = array('1','1','1','1','1','1','1','1','1','1','1');
	
    for($i = 0;$i < 12; $i++){
    	
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('E'. ($i+6), $EArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('F'. ($i+6), $FArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('G'. ($i+6), $GArr[$i]);		 
    		 $objPHPExcel -> setActiveSheetIndex(0) -> setCellValue('H'. ($i+6), $HArr[$i]);		 
   
    }
	
	
	header('pragma:public');
	header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsName . '.xls"');
	header("Content-Disposition:attachment;filename=$fileName.xls");
	//attachment新窗口打印inline本窗口打印
	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter -> save('php://output');
	exit ;
		
		
		
	 }




?>