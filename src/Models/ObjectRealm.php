<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
final class ObjectRealm extends GenericRealm
{

	/**
	 * Racktables realm object: label
	 *
     * @SWG\Property();
     * @var string
     */
	private $label;
	
	/**
	 * Racktables realm object: asset number
	 *
     * @SWG\Property();
     * @var string
     */
	private $asset_no;
	
	/**
	 * Racktables realm object: type ID
	 *
     * @SWG\Property(format="int32");
     * @var int
     */
	private $objtype_id;
	
	/**
	 * Racktables realm object: rack ID
	 *
     * @SWG\Property(format="int32");
     * @var int
     */
	private $rack_id;
	
	/**
	 * Racktables realm object: container ID
	 *
     * @SWG\Property(format="int32");
     * @var int
     */
	private $container_id;
	
	/**
	 * Racktables realm object: container name
	 *
     * @SWG\Property();
     * @var string
     */
	private $container_name;
	
	/**
	 * Racktables realm object: container type ID
	 *
     * @SWG\Property(format="int32");
     * @var int
     */
	private $container_objtype_id;
	
	/**
	 * Racktables realm object: problems property
	 *
     * @SWG\Property();
     * @var string
     */
	private $has_problems;
	
	/**
	 * Racktables realm object: ports number
	 *
     * @SWG\Property(format="int32");
     * @var int
     */
	private $nports;
	
	/**
	 * Racktables realm object: domain name
	 *
     * @SWG\Property();
     * @var string
     */
	private $dname;
	
	/**
	 * Racktables realm object: records history, grouped by date/time
	 *
     * @SWG\Property();
     * @var string[]
     */
	private $records_log;
	
	/**
	 * @SWG\Property(ref="#/definitions/Realm__comment")
     */
	private $comment;
	
	/**
	 * Racktables realm object: comments history, grouped by date/time
	 *
     * @SWG\Property();
     * @var string[]
     */
	private $comments_history;
	
	/**
	 * Racktables realm object: rackspace data, grouped by unit ID
	 *
     * @SWG\Property();
     * @var string[]
     */
	private $rackspace;
	
	/**
	 * Racktables realm object: custom attributes data, grouped by attribute ID
	 *
     * @SWG\Property();
     * @var string[]
     */
	private $attributes;

}
