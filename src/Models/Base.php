<?php

namespace RacktablesAPI;

use Interop\Container\ContainerInterface;


/**
 * @SWG\Definition()
 */
class Base
{	

	/**
	 * Slim Framework container object
	 *
     * @SWG\Property();
     * @var object
     */
	protected $container;


	/**
	 * Constructor receives container instance
     */
	public function __construct(ContainerInterface $container) 
	{
		$this->container = $container;
	}

}
