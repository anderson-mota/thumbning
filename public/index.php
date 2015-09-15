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

$app->post('/upload', function() use ($app) {
    $upload = new App\Upload(__DIR__ . '/data/upload');
    $upload->imageValidation();
    $file_info = $upload->info();

    try {
        $upload->run();
    } catch (\Exception $e) {
        $errors = $upload->file->getErrors();
        return $app->json(['status' => 'tra_error', 'errors' => $errors, 'exception' => $e], 301);
    }

    return $app->json(['status' => 'tra_success', 'file' => $file_info]);
});

$app->run();