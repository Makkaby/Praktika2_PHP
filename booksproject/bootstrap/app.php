<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/database.php';

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

$container = new DI\Container();

Slim\Factory\AppFactory::setContainer($container);

$app = Slim\Factory\AppFactory::create();

$container->set('settings', function () {
    return [
        'displayErrorDetails' => getenv('APP_DEBUG') === 'true',

        'app' => [
            'name' => getenv('APP_NAME')
        ],

        'views' => [
            'cache' => getenv('VIEW_CACHE_DISABLED') === 'true' ? false : __DIR__ . '/../storage/views'
        ]
    ];
});

$twig = new Slim\Views\Twig(__DIR__ . '/../resources/views', [
    'cache' => $container->get('settings')['views']['cache']
]);

$twigMiddleware = new Slim\Views\TwigMiddleware(
    $twig,
    $container,
    $app->getRouteCollector()->getRouteParser()
);

$app->add($twigMiddleware);

'database' => [
    'connection' => getenv('DB_CONNECTION'),
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
    'database' => getenv('DB_DATABASE'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD')
    ]
require_once __DIR__ . '/../routes/web.php';
