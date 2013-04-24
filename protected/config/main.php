<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('root', dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR);

return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Personal Cab',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
        // 'application.modules.admin.helpers.*',
        // 'application.extensions.YiiMailer.YiiMailer',
    ),

    'modules'=>array(

      'admin'=>array(
          // 'layout'=>'admin',
          // 'layout'=>'application.modules.admin.views.layouts.admin',    
          ),
      'driver'=>array( 
          ),      
      'client'=>array( 
          ),
      ),

      'components'=>array(
        
        'user'=>array(
          // enable cookie-based authentication
          'allowAutoLogin'=>true,
        ),

        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            // 'defaultRoles'=>array('authenticated', 'admin'),
        ),

        'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            // 'params'=>array('directory'=>'/opt/local/bin'),
        ),
    
        'urlManager'=>array(
          'urlFormat'      => 'path',
          'showScriptName' => false,  
          'rules'          => array(

           '<controller:\w+>/<id:\d+>'=>'<controller>/view',
           '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
            
            // '/'=>'site/index',
            // 'site/<url_name:\w+>'=>'article/static',

            // 'product/<product_id:\d+>'=>'product/view',
            // 'cart/'=>'cart/view',
            
            // 'page/<view>'=>array('site/page'),  // static pages
            // 'admin/'=>'admin/product/index',
            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
        ),        
              
        'errorHandler'=>array(
          // use 'site/error' action to display errors
          'errorAction'=>'site/error',
        ),

        'session' => array (
            'autoStart' => true,
        ),  
                
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
      'adminEmail'=>'personal-cab@mail.ru',
      'phones'=>array('(495) 972-77-77'),

    ),
);
