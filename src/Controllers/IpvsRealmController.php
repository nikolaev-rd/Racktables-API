<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
final class IpvsRealmController extends GenericRealmController
{
	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm = 'ipvs';
	
	
	/**
	 * @SWG\Get(
	 *   path="/ipvs",
	 *   produces={"application/json"}, 
	 *   tags={"ipvs"}, 
	 *   summary="IPvs data",
	 *   operationId="getAllItems",
	 *   @SWG\Response(
	 *       response=200,
	 *       description="Return data for all Racktables realms of type 'ipvs'.",
	 *   ), 
	 *   @SWG\Response(
	 *       response=404,
	 *       description="No items of Racktables realms of type 'ipvs' was found.",
	 *   ), 
	 * )
	 */


	/**
	 * @SWG\Get(
	 *     path="/ipvs/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"ipvs"}, 
	 *     summary="IPvs data",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="IPvs ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for Racktables realm of type 'ipvs' with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/IpvsRealm"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables realms of type 'ipvs' with this ID was not found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=415,
	 *         description="Wrong data format (error).",
	 *     ), 
	 * )
	 */

}
