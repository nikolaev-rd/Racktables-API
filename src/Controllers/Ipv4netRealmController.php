<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
final class Ipv4netRealmController extends GenericRealmController
{
	/**
	 * @SWG\Property(ref="#/definitions/realm")
         */
	protected $realm = 'ipv4net';
	
	
	/**
	 * @SWG\Get(
	 *   path="/ipv4net",
	 *   produces={"application/json"}, 
	 *   tags={"ipv4net"}, 
	 *   summary="IPv4 networks data",
	 *   operationId="getAllItems",
	 *   @SWG\Response(
	 *       response=200,
	 *       description="Return data for all Racktables realms of type 'ipv4net'.",
	 *   ), 
	 *   @SWG\Response(
	 *       response=404,
	 *       description="No items of Racktables realms of type 'ipv4net' was found.",
	 *   ), 
	 * )
	 */
	public function getAllItems(Request $request, Response $response, array $args) 
	{	
		$this->container->logger->info('Route /'.$this->realm);
		
		$ipv4netRealm = new Ipv4netRealm($this->container);
		
		$data = scanRealmByText($this->realm, '');
		
		foreach ($data as $id => $value) {
			$data[$id]['ip_dec'] = $ipv4netRealm->convertIp4BinToInt($data[$id]['ip_bin']);
			$data[$id]['mask_dec'] = $ipv4netRealm->convertIp4BinToInt($data[$id]['mask_bin']);
			
			unset($data[$id]['ip_bin']);
			unset($data[$id]['mask_bin']);
		}
			
		if (empty($data)) {
			return $response->withStatus(404)->withJson(["warning" => "No items of Racktables realm of type '".$this->realm."' was found."]);
		}
		else {
			return $response->withJson($data);
		}
    }
	
	/**
	 * @SWG\Get(
	 *     path="/ipv4net/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"ipv4net"}, 
	 *     summary="IPv4 networks data",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="IPv4 network ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for Racktables realm of type 'ipv4net' with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/Ipv4netRealm"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables realms of type 'ipv4net' with this ID was not found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=415,
	 *         description=MSG__WRONG_FORMAT,
	 *     ), 
	 * )
	 */
	public function getItemById(Request $request, Response $response, array $args) 
	{	
		$ipv4netRealm = new Ipv4netRealm($this->container);
		$ipv4netRealm->setId($request, $response, $args);
		$id = $ipv4netRealm->id;
		
		$this->container->logger->info('Route /'.$this->realm.'/'.$id);
		
		if ($ipv4netRealm->validateId($id)) {
			try {
				$data = spotEntity($this->realm, $id);
				
				$data['ip_dec'] = $ipv4netRealm->convertIp4BinToInt($data['ip_bin']);
				$data['mask_dec'] = $ipv4netRealm->convertIp4BinToInt($data['mask_bin']);
				
				unset($data['ip_bin']);
				unset($data['mask_bin']);
				
				return $response->withJson($data);
			} 
			catch (\Exception $e) {
				return $response->withStatus(404)->withJson(["warning" => $e->getMessage()]);
			}
		}
		else {
			return $response->withStatus(415)->withJson(["error" => MSG__WRONG_FORMAT." (id = $id)"]);
		}
    }
}
