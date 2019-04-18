<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class RowRealm extends GenericRealm
{
	
	/**
     * @SWG\Property(format="int32");
     * @var int
     */
	private $location_id;
	
	/**
     * @SWG\Property();
     * @var string
     */
	private $location_name;
	
	/**
     * @SWG\Property(format="int32");
     * @var int
     */
	private $rackc;

}
