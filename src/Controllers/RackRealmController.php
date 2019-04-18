<?php

namespace RacktablesAPI;


/**
 * @SWG\Definition()
 */
final class RackRealmController extends GenericRealmController
{
	
	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm = 'rack';
	
	
	/**
	 * @SWG\Get(
	 *     path="/racks",
	 *     produces={"application/json"}, 
	 *     tags={"racks"}, 
	 *     summary="Racks data",
	 *     operationId="getAllItems",
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for all Racktables realms of type 'rack'.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="No items of Racktables realms of type 'rack' was found.",
	 *     ), 
	 * )
	 */
	 
	 /**
	 * @SWG\Get(
	 *     path="/racks/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"racks"}, 
	 *     summary="Racks data",
	 *     operationId="getItemById",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="Rack ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for Racktables realm of type 'rack' with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/RackRealm"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables realms of type 'rack' with this ID was not found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=415,
	 *         description=MSG__WRONG_FORMAT,
	 *     ),
	 * )
	 */

}
