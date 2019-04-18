<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
final class Ipv4rspoolRealmController extends GenericRealmController
{
	
	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm = 'ipv4rspool';
	
	
	/**
	 * @SWG\Get(
	 *   path="/ipv4rspool",
	 *   produces={"application/json"}, 
	 *   tags={"ipv4rspool"}, 
	 *   summary="IPv4rspool data",
	 *   operationId="getAllItems",
	 *   @SWG\Response(
	 *       response=200,
	 *       description="Return data for all Racktables realms of type 'ipv4rspool'.",
	 *   ), 
	 *   @SWG\Response(
	 *       response=404,
	 *       description="No items of Racktables realms of type 'ipv4rspool' was found.",
	 *   ), 
	 * )
	 */


	/**
	 * @SWG\Get(
	 *     path="/ipv4rspool/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"ipv4rspool"}, 
	 *     summary="IPv4rspool data",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="IPv4rspool ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for Racktables realm of type 'ipv4rspool' with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/Ipv4rspoolRealm"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables realms of type 'ipv4rspool' with this ID was not found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=415,
	 *         description=MSG__WRONG_FORMAT,
	 *     ), 
	 * )
	 */

}
