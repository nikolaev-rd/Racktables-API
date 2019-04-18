<?php

# Load settings
$settings = require 'settings.php';


define('API_VERSION', implode('.', $settings['version']));
define('HOSTNAME', gethostname());

define('MSG__WRONG_FORMAT', "Wrong data format");
