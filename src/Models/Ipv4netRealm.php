<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
final class Ipv4netRealm extends GenericRealm
{
	
	/**
	 * Racktables realm object ipv4net: IP - canonical format
	 *
     * @SWG\Property();
     * @var string
     */
	private $ip;
	
	/**
	 * Racktables realm object ipv4net: IP - decimal format
	 *
     * @SWG\Property(format="int32");
     * @var int
     */
	private $ip_dec;
	
	/**
	 * Racktables realm object ipv4net: network mask
	 *
     * @SWG\Property(format="int32");
     * @var int
     */
	private $mask;
	
	/**
     * @SWG\Property(property="8021q")
	 * @var string[]
     */
	
	/**
	 * Racktables realm object ipv4net: VLAN count
	 *
     * @SWG\Property(format="int32");
     * @var int
     */
	private $vlanc;
	
	/**
	 * Racktables realm object ipv4net: spare ranges
	 *
     * @SWG\Property();
     * @var string[]
     */
	private $spare_ranges;
	
	/**
     * @SWG\Property(format="int32");
     * @var int
     */
	private $kidc;
	
	/**
	 * @SWG\Property(ref="#/definitions/Realm__comment")
     */
	private $comment;
	
	
	public function convertIp4BinToInt($ip_bin)
	{	
		return ip4_bin2int($ip_bin);
	}

}
