<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'CodeTag',
	
	

	// preloading 'log' component
	'preload'=>array('log'),	
	'preload'=>array('log','translate'),

	// autoloading model and component classes
	'import'=>array(
		'bootstrap.helpers.*',
        'bootstrap.behaviors.*',
        'bootstrap.widgets.*',
		'application.models.*',
		'application.components.*',
		// inserto los componentes de las clases segun lo indica la instruccion 
		//despues de descargar los  frameworks de yii yiiuser y rights
		'application.modules.user.*',
		'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.multas.*',
		'application.modules.multas.models.*',
        'application.modules.multas.components.*',
        'application.modules.rights.*', 
        'application.modules.rights.components.*',
        'application.modules.terceros.*', 
        'application.modules.terceros.models.*',
        'application.modules.terceros.components.*',
        'application.helpers.*',        
        'application.gallery.*',
        'ext.galleryManager',
        'application.extensions.gallery.*', 
        'application.extensions.gallery.models.*', 		
		'ext.yiimailer.YiiMailer',		
		//'ext.googlecalendar.googlecalendar',
	),
	'theme'=>'bootstrap',
	'modules'=>array(
	
	// se crea user paraa modules
	 	'user'=>array(
                # encrypting method (php hash function)
                'hash' => 'md5',
 
                # send activation email
                'sendActivationMail' => true,
 
                # allow access for non-activated users
                'loginNotActiv' => false,
 
                # activate user on registration (only sendActivationMail = false)
                'activeAfterRegister' => false,
 
                # automatically login from registration
                'autoLogin' => true,
 
                # registration path
                'registrationUrl' => array('/user/registration'),
 
                # recovery password path
                'recoveryUrl' => array('/user/recovery'),
 
                # login form path
                'loginUrl' => array('/user/login'),
 
                # page after login
                'returnUrl' => array('/user/profile'),
 
                # page after logout
                'returnLogoutUrl' => array('/user/login'),
        ),
        // uncomment the following to enable the Gii tool
		// activo  la herramienta gii que es la cual me va a permitir utilizar para el modelamieno
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array('bootstrap.gii','application.gii'),
		),
		// se activa el modulo   para que no ponga problemas con permisos y se pueda integrar
		
		'terceros',
		'user',
		// crear  el metodo rihgts para su  instalacion
	 	'rights'=>array(
          //'install'=>true,
          //despues de su instalacion ponemos lo de la pagina
          
               'superuserName'=>'Admin', // Name of the role with super user privileges. 
               'authenticatedName'=>'Authenticated',  // Name of the authenticated user role. 
               'userIdColumn'=>'id', // Name of the user id column in the database. 
               'userNameColumn'=>'username',  // Name of the user name column in the database. 
               'enableBizRule'=>true,  // Whether to enable authorization item business rules. 
               'enableBizRuleData'=>true,   // Whether to enable data for business rules. 
               'displayDescription'=>true,  // Whether to use item description instead of name. 
               'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages. 
               'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages. 
 
               'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested. 
               'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights. 
               'appLayout'=>'application.views.layouts.main', // Application layout. 
               'cssFile'=>'rights.css', // Style sheet file to use for Rights. 
               'install'=>false,  // Whether to enable installer. 
               'debug'=>false, 

          
        ),
	),
	'language'=>'es',
	// application components
	'components'=>array(	
			
	// se  agregan los siguientes componentes para user y authmanager pedir explicacion de la funcionalidad a andres
		'user'=>array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),            
        ),
        'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            //'params'=>array('directory'=>'/opt/local/bin'),
        ),
        'authManager'=>array(
            'class'=>'RDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'authitem',
            'itemChildTable'=>'authitemchild',
            'assignmentTable'=>'authassignment',
            'rightsTable'=>'rights',
        ),
		// uncomment the following to enable URLs in path-format
		/**/
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
        
		/**/
		//se comentarea la conectionstring de sqlite para activar la de mysql
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		// descomentareo  la conection string para onectarme con mysql
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=codetagdb',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			// le agrego el prefix tbl_ para que no me presente problemas con el framework y a extraer a info de la db 
			'tablePrefix' => 'tbl_',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
	
	'controllerMap'=>array('gallery'=>'ext.gallery.GalleryController'),
	
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
	),
	
);