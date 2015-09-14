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

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__.'/../views',
]);

$app->get('/', function() use ($app) {
    return $app['twig']->render('home.twig');
});

$app->post('/upload', function() use ($app) {
    $upload_path = __DIR__ . '/data/upload';
    $storage = new \Upload\Storage\FileSystem($upload_path);
    $file = new \Upload\File('file', $storage);

    $new_filename = uniqid();
    $file->setName($new_filename);

    $file->addValidations([
        new \Upload\Validation\Mimetype(['image/png', 'image/jpeg', 'image/jpg']),
        new \Upload\Validation\Size('5M')
    ]);

    $file_data = [
        'path'       => '/data/upload/' . $file->getNameWithExtension(),
        'name'       => $file->getNameWithExtension(),
        'extension'  => $file->getExtension(),
        'mime'       => $file->getMimetype(),
        'size'       => $file->getSize(),
        'md5'        => $file->getMd5(),
        'dimensions' => $file->getDimensions()
    ];

    try {
        $file->upload();
    } catch (\Exception $e) {
        $errors = $file->getErrors();
        return $app->json(['status' => 'tra_error', 'errors' => $errors, 'exception' => $e], 301);
    }

    return $app->json(['status' => 'tra_success', 'file' => $file_data]);

});

$app->run();