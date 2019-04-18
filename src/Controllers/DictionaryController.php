<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class DictionaryController extends BaseController
{

	/**
	 * @SWG\Get(
	 *   path="/dictionary",
	 *   produces={"application/json"}, 
	 *   tags={"dictionary"}, 
	 *   summary="Dictionary data",
	 *   operationId="getAllItems",
	 *   @SWG\Response(
	 *       response=200,
	 *       description="Return data of all Racktables dictionary.",
	 *   ), 
	 *   @SWG\Response(
	 *       response=404,
	 *       description="No items of Racktables dictionary was found.",
	 *   ), 
	 * )
	 */
	public function getAllItems(Request $request, Response $response, array $args) 
	{	
		$this->container->logger->info('Route /dictionary');
		
		// Load Racktables dictionary
		$racktables_dictionary = $this->container->get('rt_dictionary');
		
		$data = $racktables_dictionary;
		
		if (empty($data)) {
			return $response->withStatus(404)->withJson(["error" => "No items of Racktables dictionary was found."]);
		}
		else {
			return $response->withJson($data);
		}
    }

	/**
	 * @SWG\Get(
	 *     path="/dictionary/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"dictionary"}, 
	 *     summary="Dictionary data",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="Dictionary item ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data of Racktables dictionary item with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/Dictionary"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables dictionary item with this ID was not found.",
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
	
		$dictionary = new Dictionary($this->container);
		$dictionary->setId($request, $response, $args);
		$id = $dictionary->id;
		
		$this->container->logger->info('Route /dictionary/'.$id);
		
		# Load Racktables dictionary
		$racktables_dictionary = $this->container->get('rt_dictionary');

		# Remove G-markers. 
		# More info: http://wiki.racktables.org/index.php/RackTablesDevelGuide#G-markers
		array_walk($racktables_dictionary, function (&$value, $key) {
			$value = str_replace(array('%GPASS%','%GSKIP%'), ' ', $value);
		});
		
		if ($dictionary->validateId($id)) {
			try {
				$data = $racktables_dictionary[$id];
				
				if (empty($data)) {
					return $response->withStatus(404)->withJson(["error" => "Racktables dictionary item with this ID was not found."]);
				}
				else {
					return $response->withJson($data);
				}
			} 
			catch (Exception $e) {
				return $response->withStatus(500)->withJson(["error" => $e->getMessage()]);
			}
		}
		else {
			return $response->withStatus(415)->withJson(["error" => MSG__WRONG_FORMAT." (id = $id)"]);
		}
    }

}
