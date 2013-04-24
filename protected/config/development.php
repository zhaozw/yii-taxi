<?php

return CMap::mergeArray(
  require(dirname(__FILE__).'/main.php'),
  array(
    'modules'=>array(
      'gii'=>array(
          'class'     =>'system.gii.GiiModule',
          'password'  =>'stopstop',
          'ipFilters' => array('127.0.0.1'),
          ),
    ),

     'components'=>array(
        'db'=> array(                   
          'connectionString'  => 'pgsql:host=localhost;dbname=taxi',
          'emulatePrepare'    => true,
          'username'          => 'postgres',
          'password'          => 'root',
          'charset'           => 'utf8',   
          'enableParamLogging'=> true,
          'enableProfiling'   => true,                        
          'schemaCachingDuration'=>600,           
        ),
        
        'cache'=> array(
          'class' => 'system.caching.CFileCache',
        ),  

        'log'=>array(
          'class'=>'CLogRouter',
          'routes'=>array(
            // array(
            //   'class'=>'CFileLogRoute',
            //   'levels'=>'trace',
            //   // 'levels'=>'profile',
            //   'categories'=>'system.db.*',
            //   'logFile'=>'sql.log',
            // ),
            array(
              // лог внизу страницы
              'class'=>'CWebLogRoute',
              'levels'=>'trace, info, profile,error',
              'levels'=>'profile',        
              'class'=>'ext.db_profiler.DbProfileLogRoute',
              'countLimit' => 1, // How many times the same query should be executed to be considered inefficient
              'slowQueryMin' => 0.01, // Minimum time for the query to be slow
            ),
          ),
        ),    
     ),
  )
);