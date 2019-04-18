<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;
use Interop\Container\ContainerInterface;


/**
 * @SWG\Definition()
 */
class GenericRealmController extends BaseController
{
	
	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm;
	
	
	public function getAllItems(Request $request, Response $response, array $args) 
	{	
		$this->container->logger->info('Route /'.$this->realm);
		
		$data = scanRealmByText($this->realm, '');
			
		if (empty($data)) {
			return $response->withStatus(404)->withJson(["warning" => "No items of Racktables realm of type '".$this->realm."' was found."]);
		}
		else {
			return $response->withJson($data);
		}
    }
	
	public function getItemById(Request $request, Response $response, array $args) 
	{	
		$this->container->logger->info('Route /'.$this->realm.'/'.$id);
		
		$genericRealm = new GenericRealm($this->container);
		$genericRealm->setId($request, $response, $args);
		$id = $genericRealm->id;
		
		if ($genericRealm->validateId($id)) {
			try {
				$data = spotEntity($this->realm, $id);
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
