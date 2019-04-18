<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
final class VstRealm extends GenericRealm
{
	
	/**
     * @SWG\Property();
     * @var string
     */
	private $description;
	
	/**
     * @SWG\Property(format="int32");
     * @var int
     */
	private $mutex_rev;
	
	/**
     * @SWG\Property();
     * @var string
     */
	private $saved_by;
	
	/**
     * @SWG\Property(format="int32");
     * @var int
     */
	private $switchc;
	
	/**
     * @SWG\Property(format="int32");
     * @var int
     */
	private $rulec;

}
