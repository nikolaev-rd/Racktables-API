<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class InfoController extends BaseController
{	
	
	/**
	 * @SWG\Get(
	 *     path="/version",
	 *     produces={"application/json"}, 
	 *     tags={"version"}, 
	 *     summary="Versions of main components",
	 *     operationId="getVersionsInfo",
	 *     @SWG\Response(
	 *         response=200,
	 *         description="Return array of versions of main components (Racktables API, PHP, Database Server, GIT Repository).",
	 *     ), 
	 *     @SWG\Response(
	 *         response=404,
	 *         description="No information about versions was found.",
	 *     ), 
	 *     @SWG\Response(
	 *         response=500,
	 *         description="Unknown exception.",
	 *     ),
	 * )
	 */
	public function getVersionsInfo(Request $request, Response $response, array $args) 
	{	
		$this->container->logger->info('Route /version');
		
		// Get Racktables DB Connect attributes
		$racktables_db = $this->container->get('rt_pdo');
		
		$Info = new Info($this->container);
		
		try {
			# Check MySQL version
			if (isset($racktables_db)) {
				$db_server_name = strtoupper($racktables_db->getAttribute(\PDO::ATTR_DRIVER_NAME));
				$db_server_version = $racktables_db->getAttribute(\PDO::ATTR_SERVER_VERSION);
			}
			else {
				$this->container->logger->error('Database connect link ($dbxlink) is empty.');
				return $response->withStatus(500)->withJson(["error" => 'Database connect link ($dbxlink) is empty.']);
			}
			
			if (`which git`) {
				# Git pretty formats: https://git-scm.com/docs/pretty-formats
				$Info->setGitAuthorName();
				$Info->setGitAuthorEmail();
				$Info->setGitCommitDate();
				$Info->setGitCommitDescription();
				$Info->setGitCommitHashFull();
				$Info->setGitCommitHashShort();
				$Info->setGitCommitterName();
				$Info->setGitCommitterEmail();
			}
			else {
				$this->container->logger->warning('GIT not installed (git command does not exist).');
			}
			
			
			$data = 
			[
				'API' => 
				[
					'version' => $this->container->get('version'),
				],
				
				'PHP' => 
				[
					'version' => phpversion(),
				],
					
				$db_server_name => 
				[
					'version' => $db_server_version,
				],
					
				'GIT repository info' => 
				[
					'Commit date' => $Info->git_commit_date,
					'Commit description' => $Info->git_commit_description,
					'Commit hash (full)' => $Info->git_commit_hash_full,
					'Commit hash (short)' => $Info->git_commit_hash_short,
					'Author name' => $Info->git_author_name,
					'Author email' => $Info->git_author_email,
					'Committer name' => $Info->git_committer_name,
					'Committer email' => $git_committer_email,
				],
			];
		} 
		catch (\Exception $e) {
			return $response->withStatus(500)->withJson(["error" => $e->getMessage()]);
		}
		
		if (empty($data)) {
			return $response->withStatus(404)->withJson(["warning" => "No information about versions was found."]);
		}
		else {
			return $response->withJson($data);
		}
    }

}
