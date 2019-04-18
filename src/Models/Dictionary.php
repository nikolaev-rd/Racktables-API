<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class Dictionary extends Model
{

	/**
	 * Racktables dictionary ID
	 *
     * @SWG\Property(format="int32");
     * @var int
     */
	protected $id;

}
