<?php

namespace RacktablesAPI;


/**
 * @SWG\Definition()
 */
final class RowRealmController extends GenericRealmController
{

	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm = 'row';
	
	
	/**
	 * @SWG\Get(
	 *     path="/rows",
	 *     produces={"application/json"}, 
	 *     tags={"rows"}, 
	 *     summary="Rows data",
	 *     operationId="getAllItems",
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for all Racktables realms of type 'row'.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="No items of Racktables realms of type 'row' was found.",
	 *     ), 
	 * )
	 */
	 
	 /**
	 * @SWG\Get(
	 *     path="/rows/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"rows"}, 
	 *     summary="Rows data",
	 *     operationId="getItemById",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="Row ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for Racktables realm of type 'row' with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/RowRealm"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables realms of type 'row' with this ID was not found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=415,
	 *         description=MSG__WRONG_FORMAT,
	 *     ),
	 * )
	 */

}
