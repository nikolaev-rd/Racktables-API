<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
final class LocationRealmController extends GenericRealmController
{
	
	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm = 'location';
	
	
	/**
	 * @SWG\Get(
	 *   path="/locations",
	 *   produces={"application/json"}, 
	 *   tags={"locations"}, 
	 *   summary="Locations data",
	 *   operationId="getAllItems",
	 *   @SWG\Response(
	 *       response=200,
	 *       description="Return data for all Racktables realms of type 'location'.",
	 *   ), 
	 *   @SWG\Response(
	 *       response=404,
	 *       description="No items of Racktables realms of type 'location' was found.",
	 *   ), 
	 * )
	 */


	/**
	 * @SWG\Get(
	 *     path="/locations/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"locations"}, 
	 *     summary="Location data",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="Location ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for Racktables realm of type 'location' with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/LocationRealm"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables realms of type 'location' with this ID was not found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=415,
	 *         description=MSG__WRONG_FORMAT,
	 *     ), 
	 * )
	 */

}
