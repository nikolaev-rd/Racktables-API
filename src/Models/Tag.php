<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class Tag extends Model
{

	/**
     * @SWG\Property(ref="#/definitions/Realm__id")
     */
	protected $id;
	
	/**
	 * @SWG\Definition(
     *     definition="Tag__name", 
	 *     type="string",
	 *     description="Racktables tag name"
	 * )
	 *
	 * @SWG\Property()
	 * @var string
     */
	protected $name;
	
	
	/**
	 * Set tag name by id
	 * 
	 * @param	$id
	 * @return 	string
	 */
	public function setName(int $id)
	{
		# Load Racktables tags list
		$racktables_tags = $this->container->get('rt_tags');
		
		$this->name = $racktables_tags[$id]['tag'];
	}

}
