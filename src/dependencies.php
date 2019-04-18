<?php

$container = $app->getContainer();

# monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
	$handler = new Monolog\Handler\StreamHandler($settings['path'], $settings['level']);
	$handler->setFormatter(new \Monolog\Formatter\LineFormatter(null, null, false, true));
	# Uncomment the line below to add Processor UID in the end of log message. It will look something like that: {"uid":"ccb201d"}
	//$logger->pushProcessor(new Monolog\Processor\UidProcessor()); 
    $logger->pushHandler($handler);
    return $logger;
};


# Racktables dictionary
$container['rt_dictionary'] = function ($c) {
	require($_SERVER['DOCUMENT_ROOT'].'/inc/dictionary.php');
	return $dictionary;
};

# Racktables tags
$container['rt_tags'] = function ($c) {
	return getTagChart(getConfigVar('TAGS_TOPLIST_SIZE'));
};

# Racktables RackCodes stats
$container['rt_rackcode_stats'] = function ($c) {
	require($_SERVER['DOCUMENT_ROOT'].'/inc/code.php');
	return getRackCodeStats();
};

# Racktables DB connect link via PDO
$container['rt_pdo'] = function ($c) {
	return $GLOBALS['dbxlink'];
};

$container['rt_realms'] = function ($c) {
	return $GLOBALS['SQLSchema'];
};
