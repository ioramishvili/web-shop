<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Магазин',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'ru',
    'sourceLanguage'=>'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'products' => [
            'class' => 'app\modules\products\Module',
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'NbPk6UBtOlb-3HPgHCBEw254QulkLvoR',
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
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            'useFileTransport' => true,
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
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'products/default'
                    ]
                ],
                [
                    'pattern' => 'products',
                    'route' => 'products/default/create',
                    'verb' => 'POST',
                ],
                [
                    'pattern' => 'products/<id:\d+>',
                    'route' => 'products/default/view',
                    'verb' => 'GET',
                ],
                [
                    'pattern' => 'products/<id:\d+>',
                    'route' => 'products/default/update',
                    'verb' => 'PATCH',
                ],
                [
                    'pattern' => 'products/<id:\d+>',
                    'route' => 'products/default/delete',
                    'verb' => 'DELETE',
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module'
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
