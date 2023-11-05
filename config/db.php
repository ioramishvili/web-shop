<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => sprintf('mysql:host=%s;dbname=%s', 'shop-mysql', 'shop'),
    'username' => 'shop',
    'password' => 'p@ssw0rd',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
