<?php
$config = [
        'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        'mysql' => [
            // Eloquent configuration
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'u405221792_promo',
            'username'  => 'root',
            'password'  => '0714ki!!',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
        ],
        'pgsql' => [
            // Eloquent configuration
            'driver' => 'pgsql',
            'host' => '41.93.38.76',
            'port' => '5432',
            'database' => 'costech_rmp_db',
            'username' => 'postgres',
            'password' => 'laamu',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ]];

$app = new \Slim\App($config);

$container=$app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['pgsql']);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db']=function ($container) use ($capsule){
    return $capsule;
};

$db = $container->get('db');

