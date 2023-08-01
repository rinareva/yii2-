<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'tututor',
    //'homeUrl' => '/',
    'layout' => 'main3',
    'language' => 'ru',
    //'language' => 'en',
    'bootstrap' => ['languagepicker'],
    'basePath' => dirname(__DIR__),
    //'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset/',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    // 'modules' => [
    //     'admin' => [
    //         'class' => 'app\modules\admin\Module',
    //     ],
    //     'user' => [
    //         'class' => 'dektrium\user\Module',
    //         'enableUnconfirmedLogin' => true,
    //         'confirmWithin' => 21600,
    //         'cost' => 12,
    //         'admins' => ['admin'], 
    //     ],
    // ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'UGjlHOJ_b2XwdvT0tvaYHxSEKLqaWE1k',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'jkaaaty01@gmail.com',
                'username' => 'Katy',
                'password' => '123',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => ['<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'languagepicker' => [
            'class' => 'lajax\languagepicker\Component',
            'languages' => ['en' => 'English', 'de' => 'Deutsch', 'fr' => 'Français', 'ru' => 'Русский']
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
