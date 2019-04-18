<?php

namespace RacktablesAPI;


/**
 * @SWG\Definition()
 */
final class FileRealmController extends GenericRealmController
{
	
	/**
	 * @SWG\Property(ref="#/definitions/realm")
     */
	protected $realm = 'file';
	
	
	/**
	 * @SWG\Get(
	 *     path="/files",
	 *     produces={"application/json"}, 
	 *     tags={"files"}, 
	 *     summary="Files data",
	 *     operationId="getAllItems",
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for all Racktables realms of type 'file'.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="No items of Racktables realms of type 'file' was found.",
	 *     ), 
	 * )
	 */
	 
	 /**
	 * @SWG\Get(
	 *     path="/files/{id}",
	 *     produces={"application/json"}, 
	 *     tags={"files"}, 
	 *     summary="Files data",
	 *     operationId="getItemById",
	 *     @SWG\Parameter(
	 *         name="id", 
	 *         in="path", 
	 *         required=true, 
	 *         type="integer", 
	 *         format="int32", 
	 *         description="File ID", 
	 *     ), 
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return data for Racktables realm of type 'file' with specified ID.",
	 *         @SWG\Schema(
	 *             type="array",
	 *             @SWG\Items(ref="#/definitions/FileRealm"),
	 *         ),
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="Racktables realms of type 'file' with this ID was not found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=415,
	 *         description=MSG__WRONG_FORMAT,
	 *     ),
	 * )
	 */

}
