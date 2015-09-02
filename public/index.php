<?php
/**
 * Created by PhpStorm.
 * User: anderson.mota
 * Date: 02/09/2015
 * Time: 18:12
 *
 * @author Anderson Mota <anderson.mota@lqdi.net>
 */

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__.'/../views',
]);

$app->get('/', function() use ($app) {
    return $app['twig']->render('home.twig');
});

$app->run();