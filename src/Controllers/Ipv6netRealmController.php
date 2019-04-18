<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
final class Ipv6netRealmController extends GenericRealmController
{
	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm = 'ipv6net';
	
	
	/**
	 * @SWG\Get(
	 *   path="/ipv6net",
	 *   produces={"application/json"}, 
	 *   tags={"ipv6net"}, 
	 *   summary="IPv6 networks data",
	 *   operationId="getAllItems",
	 *   @SWG\Response(
	 *       response=200,
	 *       description="Return data for all Racktables realms of type 'ipv6net'.",
	 *   ), 
	 *   @SWG\Response(
	 *       response=404,
	 *       description="No items of Racktables realms of type 'ipv6net' was found.",
	 *   ), 
	 * )
	 */


	/**
	 * @SWG\Get(
	 *     path="/ipv6net/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"ipv6net"}, 
	 *     summary="IPv6 network data",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="IPv6 network ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for Racktables realm of type 'ipv6net' with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/Ipv6netRealm"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables realms of type 'ipv6net' with this ID was not found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=415,
	 *         description=MSG__WRONG_FORMAT,
	 *     ), 
	 * )
	 */

}
