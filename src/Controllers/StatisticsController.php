<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class StatisticsController extends BaseController
{	
	
	/**
	 * @SWG\Get(
	 *     path="/stats",
	 *     produces={"application/json"}, 
	 *     tags={"statistics"}, 
	 *     summary="Total statistics of all entities",
	 *     operationId="getTotalStatistics",
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return total statistics for Racktables realms.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/Realm__stats_total"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="No statistics information was found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=500,
	 *         description="Unknown exception.",
	 *     ),
	 * )
	 */
	public function getTotalStatistics(Request $request, Response $response, array $args) 
	{	
		$Statistics = new Statistics($this->container);
		
		$Statistics->setRacktablesRealms();
		$racktables_realms = $Statistics->racktables_realms;
		
		$this->container->logger->info('Route /stats');
		
		try {
			foreach ($racktables_realms as $key => $value) {
				$realms = scanRealmByText($key, '');
				$data[$key] = count($realms);
			}
		} 
		catch (\Exception $e) {
			return $response->withStatus(500)->withJson(["error" => $e->getMessage()]);
		}
		
		if (empty($data)) {
			return $response->withStatus(404)->withJson(["warning" => "No statistics information was found."]);
		}
		else {
			return $response->withJson($data);
		}
    }
	
	/**
	 * @SWG\Get(
	 *     path="/stats/{entity}",
	 *     produces={"application/json"}, 
	 *     tags={"statistics"}, 
	 *     summary="Detailed statistics of specified entity",
	 *     operationId="getStatisticsByEntity",
	 *     @SWG\Parameter(
	 *         name="entity", 
	 *         in="path", 
	 *         required=true, 
	 *         type="array", 
	 *         @SWG\Items(
	 *             type="string",
	 *             enum={"realms", "rackspace", "rackcode", "ipv4", "ipv6", "vlan", "file", "tag", "dictionary"},
	 *             default="realms"
	 *         ),
	 *         description="Racktables entity", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return statistics for specified Racktables entity.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/rackspace_stats"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Entity was not found in Racktables or excluded from statistics."
	 *     ),
	 *     @SWG\Response(
	 *         response=415,
	 *         description=MSG__WRONG_FORMAT,
	 *     ), 
     *     @SWG\Response(
	 *         response=500,
	 *         description="Unknown exception.",
	 *     ), 
	 * )
	 */
	public function getStatisticsByEntity(Request $request, Response $response, array $args) 
	{	
	
		$Statistics = new Statistics($this->container);
		
		$Statistics->setEntity($request, $response, $args);
		$entity = $Statistics->entity;
		
		$this->container->logger->info('Route /stats/'.$entity);
		
		if ($Statistics->validateEntity($entity)) {
			try {
				switch ($entity) { 
					case 'realms':
						$Statistics->setRacktablesRealms();
						foreach ($Statistics->racktables_realms as $key => $value) {
							$data[$key] = count(scanRealmByText($key, ''));
						}
						break;
						
					case 'rackspace':
						$Statistics->setRackspaceStatistics();
						$data = $Statistics->rackspace_stats;
						break;
						
					case 'rackcode':
						$data = $this->container->get('rt_rackcode_stats');
						break;
						
					case 'ipv4':
						$data = getIPv4Stats();
						break;
						
					case 'ipv6':
						$data = getIPv6Stats();
						break;
						
					case 'vlan':
						$data = getVLANDomainStats();
						break;
						
					case 'file':
						$data = getFileStats();
						break;
						
					case 'tag':
						$data = $this->container->get('rt_tags');
						break;
						
					case 'dictionary':
						$data = getDictStats();
						break;
						
					default:
						return $response->withStatus(404)->withJson(["warning" => "Entity was not found in Racktables or excluded from statistics."]);
						break;
				}
				
				return $response->withJson($data);
			} 
			catch (\Exception $e) {
				return $response->withStatus(500)->withJson(["warning" => $e->getMessage()]);
			}
		}
		else {
			return $response->withStatus(415)->withJson(["error" => MSG__WRONG_FORMAT." (entity = $entity)"]);
		}
    }

}
