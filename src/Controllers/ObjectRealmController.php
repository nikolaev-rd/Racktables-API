<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class ObjectRealmController extends GenericRealmController
{

	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm = 'object';
	
	
	/**
	 * @SWG\Get(
	 *   path="/objects",
	 *   produces={"application/json"}, 
	 *   tags={"objects"}, 
	 *   summary="Objects data",
	 *   operationId="getAllItems",
	 *   @SWG\Response(
	 *       response=200,
	 *       description="Return data for all Racktables realms of type 'object'.",
	 *   ), 
	 *   @SWG\Response(
	 *       response=404,
	 *       description="No items of Racktables realms of type 'object' was found.",
	 *   ), 
	 * )
	 */

	/**
	 * @SWG\Get(
	 *     path="/objects/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"objects"}, 
	 *     summary="Objects data", 
	 *     operationId="getItemById",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="Object ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for Racktables realm of type 'object' with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/ObjectRealm"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables realms of type 'object' with this ID was not found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=415,
	 *         description=MSG__WRONG_FORMAT,
	 *     ),  
	 * )
	 */
	public function getItemById(Request $request, Response $response, array $args) 
	{	
	
		$ObjectRealm = new ObjectRealm($this->container);
		
		$ObjectRealm->setId($request, $response, $args);
		$id = $ObjectRealm->id;
		
		$this->container->logger->info('Route /'.$this->realm.'/'.$id);
		
		// Get Racktables DB Connect
		$racktables_db = $this->container->get('rt_pdo');
		
		if ($ObjectRealm->validateId($id)) {
			try {
				$data = spotEntity($this->realm, $id);
				
				$racktables_ObjectHistory = $racktables_db->query('SELECT * FROM `ObjectHistory` WHERE `id`='.$id);
				foreach ($racktables_ObjectHistory as $row) {
					$data['comments_history'][$row['ctime']] = [
						'name' 			=> $row['name'], 
						'asset_number' 	=> $row['asset_no'], 
						'problems' 		=> $row['has_problems'], 
						'user_name' 	=> $row['user_name'], 
						'comment' 		=> $row['comment'], 
					];
				}
				
				$racktables_ObjectLog = $racktables_db->query('SELECT * FROM `ObjectLog` WHERE `object_id`='.$id);
				foreach ($racktables_ObjectLog as $row) {
					$data['records_log'][$row['date']] = [
						'record_id' 	=> $row['id'], 
						'user_name' 	=> $row['user'], 
						'content' 		=> $row['content'], 
					];
				}
				
				$racktables_RackSpace = $racktables_db->query('SELECT * FROM `RackSpace` WHERE `object_id`='.$id);
				foreach ($racktables_RackSpace as $row) {
					$data['rackspace']['unit_'.$row['unit_no']] = [
						'atom' 			=> $row['atom'], 
						'state' 		=> $row['state'], 
					];
				}
				
				$data['attributes'] = getAttrValues($args['id']);
				
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
