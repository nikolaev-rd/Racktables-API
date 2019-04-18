<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
final class LocationRealm extends GenericRealm
{
	
	/**
     * @SWG\Property(format="int32");
     * @var int
     */
	private $refcnt;
	
	/**
     * @SWG\Property(format="int32");
     * @var int
     */
	private $parent_id;
	
	/**
     * @SWG\Property();
     * @var string
     */
	private $parent_name;
	
	/**
	 * @SWG\Property(ref="#/definitions/Realm__has_problems")
     */
	private $has_problems;
	
	/**
	 * @SWG\Property(ref="#/definitions/Realm__comment")
     */
	private $comment;

}
