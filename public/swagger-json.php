<?php

# Load Swagger-PHP
require '../vendor/autoload.php';

# Load constants
require '../src/constants.php';


/**
 * @SWG\Swagger(
 *   basePath="/api",
 *   schemes={"https"},
 *   host=HOSTNAME,
 * )
 */
$swagger = \Swagger\scan( 
	__DIR__ . '/..', # folder to scan for annotations
	[
	'exclude' => # array of folders for scan exclude
		[
		__DIR__ . '/../.git', 
		__DIR__ . '/../logs', 
		__DIR__ . '/../vendor', 
		]
	] 
);

header('Content-Type: application/json');
echo $swagger;
