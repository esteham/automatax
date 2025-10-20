<?php
<<<<<<< HEAD
// Forward all Vercel requests to Laravel's front controller
require __DIR__ . '/../public/index.php';
=======

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

/** @var Kernel $kernel */
$kernel = $app->make(Kernel::class);

$request = Request::capture();
$response = $kernel->handle($request);

$response->send();

$kernel->terminate($request, $response);
>>>>>>> c25a00b6f3e88d3c3b611e4934940055b98f9f0e
