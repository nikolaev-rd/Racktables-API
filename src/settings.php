<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Monolog settings
        'logger' => [
            'name' => 'Racktables-API',
			'path' => is_writable('../logs') ? '../logs/api.log' : 'php://stdout',
            'level' => \Monolog\Logger::DEBUG,
        ],
		
    ],
	
	// version
    'version' => [
		'major' => '0',
		'minor' => '3',
		'patch' => '0',
	],
];
