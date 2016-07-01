<?php
return array(
	//'配置项'=>'配置值'
		'URL_MODEL'	=>1,// 模式 选择:1.path-info模式       2.url模式 ,此处可不配置。默认为path-info 模式
// 		'SHOW_PAGE_TRACE' =>true,
// 		'SHOW_RUN_TIME' =>true,   //显示运行时间
// 		'SHOW_ADV_TIME' =>true,   //显示详细的运行时间
// 		'SHOW_DB_TIMES'=>true,//显示数据库操作次数
// 		'SHOW_CACHE_TIMES'=>true,//显示缓存操作次数
// 		'SHOW_USE_MEM'=>true,//显示内存开销
		
		'KEYWORDS'=>'黄石市招商局,市招商网,黄石招商,招商,黄石市杭州东路98号',
		'DESCRIPTION'=>'黄石市招商局，公司地址是黄石市杭州东路98号，我们主要经营投资与资产管理',
		
		
		'LOG_RECORD' => true, // 开启日志记录2.
		'LOG_LEVEL'  =>'SQL,DEBUG,INFO,EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误
		
		
		//SAE  STORAGE地址
		
		'STORAGE' => 'http://zhongb-uploads.stor.sinaapp.com/',
		
		//  ---数据库配置--采用在sae处配置
		'DB_TYPE' => 'mysql',
		//'DB_HOST' => '120.25.102.68',
		'DB_HOST' => '192.168.1.20',
	    'DB_NAME' => 'grid_chi', // 需要新建一个数据库！名字叫
	    'DB_USER' => 'root', // 数据库用户名
	    'DB_PWD' => '7788919', // 数据库登录密码
		'DB_PORT' => '3336',
		
		
		'DB_PREFIX' => 'tp_', // 数据库表名前缀
		'DB_CHARSET'=> 'utf8', // 字符集
		
		//开启页面追踪
		'SHOW_PAGE_TRACE' => true ,
		
		// 配置邮件发送服务器
		'MAIL_HOST' =>'smtp.163.com',
        'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
        'MAIL_USERNAME' =>'gridsoft@163.com',
        'MAIL_FROM' =>'gridsoft@163.com',
        'MAIL_FROMNAME' =>'外挂平台邮件提醒',
        'MAIL_PASSWORD' =>'7788919',
        'MAIL_CHARSET' =>'utf-8',
        'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
		 
);