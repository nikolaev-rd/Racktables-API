<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class TagController extends BaseController
{	

	/**
	 * @SWG\Definition(
	 *     definition="Tag__getAllItems",
	 *     type="object",
	 *     @SWG\Property(property="id", ref="#/definitions/Tag__getItemById"),
	 * )
	 * 
	 * @SWG\Get(
	 *     path="/tags",
	 *     produces={"application/json"}, 
	 *     tags={"tags"}, 
	 *     summary="Tags data",
	 *     operationId="getAllItems",
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data of all Racktables tags.",
	 *         @SWG\Schema(ref="#/definitions/Tag__getAllItems"),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="No items of Racktables tags was found.",
	 *     ), 
	 * )
	 */
	public function getAllItems(Request $request, Response $response, array $args) 
	{
		$this->container->logger->info('Route /tags');
		
		// Load Racktables tags
		$racktables_tags = $this->container->get('rt_tags');
		
		foreach($racktables_tags as $k => $v) {
			$data[$racktables_tags[$k]['id']] = [
				'name' => $racktables_tags[$k]['tag'],
				'parent_id' => $racktables_tags[$k]['parent_id'],
				'is_assignable' => $racktables_tags[$k]['is_assignable'],
				'trace' => $racktables_tags[$k]['trace'],
			];
		}
			
		if (empty($data)) {
			return $response->withStatus(404)->withJson(["warning" => "No items of Racktables tags was found."]);
		}
		else {
			return $response->withJson($data);
		}
    }

	/**
	 * @SWG\Definition(
     *     definition="Tag__getItemById",
	 *     type="object",
	 *     @SWG\Property(
	 *         property="name", 
	 *         ref="#/definitions/Tag__name",
	 *     ),
	 *     @SWG\Property(
	 *         property="parent_id",
	 *         ref="$/definitions/Realm__parent_id",
	 *         description="Parent ID of Racktables realm with type 'tag'",
	 *     ),
	 *     @SWG\Property(
	 *         property="is_assignable",
	 *         ref="#/definitions/Realm__is_assignable",
	 *     ),
	 *     @SWG\Property(
	 *         property="trace", 
	 *         ref="#/definitions/Realm__trace",
	 *     ),
	 * )
	 *
	 * @SWG\Get(
	 *     path="/tags/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"tags"}, 
	 *     summary="Tag data",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="Tag ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data of Racktables tag with specified ID.",
	 *         @SWG\Schema(ref="#/definitions/Tag__getItemById"),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables tag with this ID was not found.",
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
	public function getItemById(Request $request, Response $response, array $args) 
	{	
		# Load Racktables tags list
		$racktables_tags = $this->container->get('rt_tags');
		
		$Tag = new Tag($this->container);
		$Tag->setId($request, $response, $args);
		$id = $Tag->id;
		
		$this->container->logger->info('Route /tags/'.$id);
		
		if ($Tag->validateId($id)) {
			try {
				$Tag->setName($id);
				$tag_name = $Tag->name;
				
				$data = [
					'name' => $tag_name,
					'parent_id' => $racktables_tags[$id]['parent_id'],
					'is_assignable' => $racktables_tags[$id]['is_assignable'],
					'trace' => $racktables_tags[$id]['trace'],
				];
				
				if (empty($data)) {
					return $response->withStatus(404)->withJson(["warning" => "Racktables tag with this ID was not found."]);
				}
				else {
					return $response->withJson($data);
				}
			} 
			catch (\Exception $e) {
				return $response->withStatus(500)->withJson(["error" => $e->getMessage()]);
			}
		}
		else {
			return $response->withStatus(415)->withJson(["error" => MSG__WRONG_FORMAT." (id = $id)"]);
		}
    }

}
