<?php
return array(
	//'配置项'=>'配置值'
    'SESSION_AUTO_START' => true, //是否开启session
    'TMPL_L_DELIM'=>'<{', //修改左定界符
    'TMPL_R_DELIM'=>'}>', //修改右定界符
    //'SHOW_PAGE_TRACE'=>true,//开启页面Trace,易于调错


     //数据库配置
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'shop', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => '', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀prefix，此处必须写，它默认值为think_
    'DB_CHARSET' => 'utf8',      // 数据库编码默认采用utf8




    'URL_MODEL'=>2,
);