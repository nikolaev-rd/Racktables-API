<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class FileRealm extends GenericRealm
{
	
	/**
	 * Racktables realm file: type of file
	 *
     * @SWG\Property(format="date-time");
     * @var string
     */
	private $type;
	
	/**
	 * Racktables realm file: size of file in bytes
	 *
     * @SWG\Property(format="int32");
     * @var int
     */
	private $size;
	
	/**
	 * Racktables realm file: date/time when file was created
	 *
     * @SWG\Property(format="date-time");
     * @var string
     */
	private $ctime;
	
	/**
	 * @SWG\Property(ref="#/definitions/Realm__comment")
     */
	private $comment;

}
