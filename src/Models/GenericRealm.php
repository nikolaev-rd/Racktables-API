<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class GenericRealm extends Model
{

	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm;

	/**
	 * @SWG\Property(ref="#/definitions/Realm__id")
     */
	protected $id;

	/**
	 * Racktables realm name
	 *
     * @SWG\Property()
     * @var string
     */
	protected $name;

	/**
     * @SWG\Property(
	 *     type="object", 
	 *     @SWG\Property(
	 *         property="tag", 
	 *         type="string", 
	 *         example="$id_123"
	 *     )
	 * )
     */
	protected $etags;

	/**
     * @SWG\Property(
	 *     type="object", 
	 *     @SWG\Property(
	 *         property="id", 
	 *         type="object", 
	 *         description="Racktables realm itag ID",
	 *         @SWG\Property(
	 *             property="id",
	 *             type="integer",
	 *             format="int32",
     *             description="Racktables realm itag ID",
	 *         ),
	 *         @SWG\Property(
	 *             property="parent_id",
	 *             type="integer",
	 *             format="int32",
     *             description="Racktables realm parent itag ID",
	 *         ),
	 *         @SWG\Property(
	 *             property="is_assignable",
	 *             type="string", 
	 *             enum={"yes", "no"},
	 *             default="no",
	 *         ),
	 *         @SWG\Property(
	 *             property="tag", 
	 *             type="string", 
	 *             example="mytagname",
	 *         ),
	 *         @SWG\Property(
	 *             property="trace", 
	 *             type="object", 
	 *         ),
	 *     ),
	 * )
     */
	protected $itags;
	
	/**
     * @SWG\Property(
	 *     type="object", 
	 *     @SWG\Property(
	 *         property="tag", 
	 *         type="string", 
	 *         example="$untagged"
	 *     )
	 * )
     */
	protected $atags;
	
	/**
     * @SWG\Definition(
     *     definition="realm",
     *     type="string",
	 *     example="object",
     *     description="Racktables realm type",
     * )
     */
	
	/**
     * @SWG\Definition(
     *     definition="Realm__id",
     *     type="integer",
	 *     format="int32",
	 *     example="123",
     *     description="Racktables realm ID",
     * )
     */
	 
	/**
	 * @SWG\Definition(
	 *     definition="Realm__parent_id", 
	 *     type="integer",
	 *     format="int32",
	 *     description="Realm",
	 * )
	 */
	
	/**
     * @SWG\Definition(
     *     definition="Realm__comment",
     *     type="string",
     *     description="Racktables realm comment",
     * )
     */
	
	/**
     * @SWG\Definition(
     *     definition="Realm__has_problems",
     *     type="string",
	 *     enum={"yes", "no"},
	 *     default="no",
     *     description="Racktables realm problems flag",
     * )
     */
	 
	/**
	 * @SWG\Definition(
	 *     definition="Realm__is_assignable", 
	 *     type="string",
	 *     enum={"yes", "no"},
	 *     default="no",
	 * )
	 */
	 
	/**
	 * @SWG\Definition(
	 *     definition="Realm__trace", 
	 *     type="array",
	 *     @SWG\Items(type="integer"),
	 * )
	 */

}
