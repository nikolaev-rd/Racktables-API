<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
final class Ipv4vsRealmController extends GenericRealmController
{
	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm = 'ipv4vs';
	
	
	/**
	 * @SWG\Get(
	 *   path="/ipv4vs",
	 *   produces={"application/json"}, 
	 *   tags={"ipv4vs"}, 
	 *   summary="IPv4vs data",
	 *   operationId="getAllItems",
	 *   @SWG\Response(
	 *       response=200,
	 *       description="Return data for all Racktables realms of type 'ipv4vs'.",
	 *   ), 
	 *   @SWG\Response(
	 *       response=404,
	 *       description="No items of Racktables realms of type 'ipv4vs' was found.",
	 *   ), 
	 * )
	 */


	/**
	 * @SWG\Get(
	 *     path="/ipv4vs/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"ipv4vs"}, 
	 *     summary="IPv4vs data",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="IPv4vs ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for Racktables realm of type 'ipv4vs' with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/Ipv4vsRealm"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables realms of type 'ipv4vs' with this ID was not found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=415,
	 *         description=MSG__WRONG_FORMAT,
	 *     ), 
	 * )
	 */

}
