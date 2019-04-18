<?php

#
# Racktables API (http://wiki.racktables.org/index.php/RackTablesDevelGuide#API)
#

# Load Slim Framework
require '../vendor/autoload.php';

# Load setting
//$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App(require __DIR__ . '/../src/settings.php');


# Set up dependencies
require __DIR__ . '/../src/dependencies.php';

# Register middleware
require __DIR__ . '/../src/middleware.php';

# Register routes
require __DIR__ . '/../src/routes.php';

# Load constants
require '../src/constants.php';


# Racktables initialization script
require($_SERVER['DOCUMENT_ROOT'].'/inc/init.php');


/**
 * @SWG\Info(
 *     title="Racktables API", 
 *     description="Simple API for [RackTables](http://www.racktables.org/)",
 *     version=API_VERSION,
 *     @SWG\Contact(
 *         name="Roman Nikolaev",
 *         email="nikolaev.rd@yandex.ru",
 *	   ),
 *     @SWG\License(
 *         name="MIT",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html",
 *     ),
 * )
 */
$app->run();
