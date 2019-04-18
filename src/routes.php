<?php

use Slim\Http\Request;
use Slim\Http\Response;


$app->get('/', function (Request $request, Response $response) {
	/**
	 * @SWG\Get(
	 *   path="/",
	 *   produces={"application/json"}, 
	 *   tags={"version"}, 
	 *   summary="Show API version",
	 *   @SWG\Response(
	 *     response=200,
	 *     description="API version in format: major.minor.patch (example: 1.2.3)."
	 *   ), 
	 * )
	 */
	
	$version = implode('.', $this->get('version'));
	
	$this->logger->info('Route /', ['version' => $version]);
	
	return $response->withJson($version);
});


$app->get('/docs[/]', function (Request $request, Response $response) {
	return $response->withRedirect('/api-docs', 301);
});


$app->get('/objects[/]', '\RacktablesAPI\ObjectRealmController:getAllItems');
$app->get('/objects/{id}[/]', '\RacktablesAPI\ObjectRealmController:getItemById');


$app->get('/ipv4net[/]', '\RacktablesAPI\Ipv4netRealmController:getAllItems');
$app->get('/ipv4net/{id}[/]', '\RacktablesAPI\Ipv4netRealmController:getItemById');


$app->get('/ipv6net[/]', '\RacktablesAPI\Ipv6netRealmController:getAllItems');
$app->get('/ipv6net/{id}[/]', '\RacktablesAPI\Ipv6netRealmController:getItemById');


$app->get('/ipvs[/]', '\RacktablesAPI\IpvsRealmController:getAllItems');
$app->get('/ipvs/{id}[/]', '\RacktablesAPI\IpvsRealmController:getItemById');


$app->get('/ipv4vs[/]', '\RacktablesAPI\Ipv4vsRealmController:getAllItems');
$app->get('/ipv4vs/{id}[/]', '\RacktablesAPI\Ipv4vsRealmController:getItemById');


$app->get('/ipv4rspool[/]', '\RacktablesAPI\Ipv4rspoolRealmController:getAllItems');
$app->get('/ipv4rspool/{id}[/]', '\RacktablesAPI\Ipv4rspoolRealmController:getItemById');


$app->get('/files[/]', '\RacktablesAPI\FileRealmController:getAllItems');
$app->get('/files/{id}[/]', '\RacktablesAPI\FileRealmController:getItemById');


$app->get('/locations[/]', '\RacktablesAPI\LocationRealmController:getAllItems');
$app->get('/locations/{id}[/]', '\RacktablesAPI\LocationRealmController:getItemById');


$app->get('/racks[/]', '\RacktablesAPI\RackRealmController:getAllItems');
$app->get('/racks/{id}[/]', '\RacktablesAPI\RackRealmController:getItemById');


$app->get('/rows[/]', '\RacktablesAPI\RowRealmController:getAllItems');
$app->get('/rows/{id}[/]', '\RacktablesAPI\RowRealmController:getItemById');


$app->get('/vst[/]', '\RacktablesAPI\VstRealmController:getAllItems');
$app->get('/vst/{id}[/]', '\RacktablesAPI\VstRealmController:getItemById');


$app->get('/tags[/]', '\RacktablesAPI\TagController:getAllItems');
$app->get('/tags/{id}[/]', '\RacktablesAPI\TagController:getItemById');


$app->get('/dictionary[/]', '\RacktablesAPI\DictionaryController:getAllItems');
$app->get('/dictionary/{id}[/]', '\RacktablesAPI\DictionaryController:getItemById');


$app->get('/stats[/]', '\RacktablesAPI\StatisticsController:getTotalStatistics');
$app->get('/stats/{entity}[/]', '\RacktablesAPI\StatisticsController:getStatisticsByEntity');


$app->get('/version', '\RacktablesAPI\InfoController:getVersionsInfo');
