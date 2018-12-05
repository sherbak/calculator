<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=db;dbname=calculator',
    'username' => 'calculator',
    'password' => 'password',
    'charset' => 'utf8',
    'schemaMap' => [
        'pgsql' => [
            'class' => 'yii\db\pgsql\Schema',
            'defaultSchema' => 'public' //specify your schema here, public is the default schema
        ]
    ],

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
