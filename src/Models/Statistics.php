<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class Statistics extends Base
{	
	
	/**
	 * Racktables realm entity
	 *
     * @SWG\Property();
     * @var string
     */
	private $entity;
	
	/**
	 * Racktables realms list
	 *
     * @SWG\Property();
     * @var string[]
     */
	private $racktables_realms;
	
	/**
	 * Racktables rackspace statistics
	 *
     * @SWG\Property();
     * @var string[]
     */
	private $rackspace_stats;
	
	/**
	 * @SWG\Definition(
     *     definition="Realm__stats_total",
	 *     @SWG\Property(
	 *         property="object",
	 *         type="integer",
	 *         format="int32",
	 *         example="2164",
     *         description="Racktables Statistics - Total of Realm with type 'object'",
	 *     ),
	 *     @SWG\Property(
	 *         property="user",
	 *         type="integer",
	 *         format="int32",
	 *         example="34",
     *         description="Racktables Statistics - Total of Realm with type 'user'",
	 *     ),
	 *     @SWG\Property(
	 *         property="ipv4net",
	 *         type="integer",
	 *         format="int32",
	 *         example="64",
     *         description="Racktables Statistics - Total of Realm with type 'ipv4net'",
	 *     ),
	 *     @SWG\Property(
	 *         property="ipv6net",
	 *         type="integer",
	 *         format="int32",
	 *         example="69",
     *         description="Racktables Statistics - Total of Realm with type 'ipv6net'",
	 *     ),
	 *     @SWG\Property(
	 *         property="file",
	 *         type="integer",
	 *         format="int32",
	 *         example="346",
     *         description="Racktables Statistics - Total of Realm with type 'ipv6net'",
	 *     ),
	 *     @SWG\Property(
	 *         property="ipv4",
	 *         type="integer",
	 *         format="int32",
	 *         example="0",
     *         description="Racktables Statistics - Total of Realm with type 'ipv4'",
	 *     ),
	 *     @SWG\Property(
	 *         property="ipv4vs",
	 *         type="integer",
	 *         format="int32",
	 *         example="0",
     *         description="Racktables Statistics - Total of Realm with type 'ipv4vs'",
	 *     ),
	 *     @SWG\Property(
	 *         property="ipv4rspool",
	 *         type="integer",
	 *         format="int32",
	 *         example="0",
     *         description="Racktables Statistics - Total of Realm with type 'ipv4rspool'",
	 *     ),
	 *     @SWG\Property(
	 *         property="rack",
	 *         type="integer",
	 *         format="int32",
	 *         example="0",
     *         description="Racktables Statistics - Total of Realm with type 'rack'",
	 *     ),
	 *     @SWG\Property(
	 *         property="row",
	 *         type="integer",
	 *         format="int32",
	 *         example="0",
     *         description="Racktables Statistics - Total of Realm with type 'row'",
	 *     ),
	 *     @SWG\Property(
	 *         property="location",
	 *         type="integer",
	 *         format="int32",
	 *         example="11",
     *         description="Racktables Statistics - Total of Realm with type 'location'",
	 *     ),
	 *     @SWG\Property(
	 *         property="vst",
	 *         type="integer",
	 *         format="int32",
	 *         example="0",
     *         description="Racktables Statistics - Total of Realm with type 'vst'",
	 *     ),
	 * )
     */
	 
	/**
	 * @SWG\Definition(
     *     definition="rackspace_stats",
	 *     @SWG\Property(
	 *         property="Rows",
	 *         type="integer",
	 *         format="int32",
	 *         example="32",
     *         description="Rackspace Statistics - Rows Total",
	 *     ),
	 *     @SWG\Property(
	 *         property="Racks",
	 *         type="integer",
	 *         format="int32",
	 *         example="190",
     *         description="Rackspace Statistics - Racks Total",
	 *     ),
	 *     @SWG\Property(
	 *         property="Average rack height",
	 *         type="number",
	 *         format="float",
	 *         example="42.6000",
     *         description="Rackspace Statistics - Average rack height",
	 *     ),
	 *     @SWG\Property(
	 *         property="Total rack units in field",
	 *         type="integer",
	 *         format="int32",
	 *         example="3462",
     *         description="Rackspace Statistics - Total rack units in field",
	 *     ),
	 * )
     */
	
	
	/**
	 * Set entity from request arguments
	 */
	public function setEntity(Request $request, Response $response, array $args)
	{
		$this->entity = $args['entity'];
	}
	
	/**
	 * Validate entity format
	 *
	 * @param 	string
	 * @return 	boolean
	 */
	public function validateEntity($entity)
	{	
		if (!empty($entity)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	/**
	 * Load realms list from Racktables
	 */
	public function setRacktablesRealms()
	{
		$this->racktables_realms = $this->container->get('rt_realms');
	}
	
	/**
	 * Load rackspace statistics from Racktables
	 */
	public function setRackspaceStatistics()
	{
		$this->rackspace_stats = getRackspaceStats();
	}

    /**
	 * Magic method - utilized for reading data from inaccessible properties
	 *
	 * @param 	string
	 * @return 	Property
	 */
	public function __get($name)
	{
		return $this->$name;
    }

}
