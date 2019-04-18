<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class RackRealm extends GenericRealm
{
	
	/**
	 * @SWG\Property(ref="#/definitions/Realm__comment")
     */
	private $comment;

}
