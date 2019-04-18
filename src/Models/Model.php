<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class Model extends Base
{	

	/**
	 * Set ID from request arguments
	 */
	public function setId(Request $request, Response $response, array $args)
	{
		$this->id = $args['id'];
	}
	
	/**
	 * Validate ID format
	 *
	 * @param 	integer
	 * @return 	boolean
	 */
	public function validateId($id)
	{	
		if (is_numeric($id)) {
			return true;
		}
		else {
			return false;
		}
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
