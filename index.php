<?php
session_start ();


// production
if($_SERVER['HTTP_HOST'] =='www.crocusbit.ru')
{ 
  $yii= '/var/www/libs/yii/framework/yii.php';
  $config=dirname(__FILE__).'/protected/config/production.php';

  define('YII_DEBUG',false);
  defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',1);
}

// development
else   
{
  $yii=dirname(__FILE__).'/../yii/framework/yii.php';
  $config=dirname(__FILE__).'/protected/config/development.php';

  defined('YII_DEBUG') or define('YII_DEBUG',true);
  defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
}


require_once($yii);
Yii::createWebApplication($config)->run();