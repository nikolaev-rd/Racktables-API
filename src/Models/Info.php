<?php

namespace RacktablesAPI;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * @SWG\Definition()
 */
class Info
{

	/**
	 * Git repository Author name
	 *
     * @SWG\Property();
     * @var string
     */
	private $git_author_name;
	
	/**
	 * Git repository Author email
	 *
     * @SWG\Property();
     * @var string
     */
	private $git_author_email;
	
	/**
	 * Git repository commit description
	 *
     * @SWG\Property();
     * @var \DateTime
     */
	private $git_commit_date;
	
	/**
	 * Git repository commit description
	 *
     * @SWG\Property();
     * @var string
     */
	private $git_commit_description;
	
	/**
	 * Git repository commit hash (long format)
	 *
     * @SWG\Property();
     * @var string
     */
	private $git_commit_hash_full;
	
	/**
	 * Git repository commit hash (short format)
	 *
     * @SWG\Property();
     * @var string
     */
	private $git_commit_hash_short;
	
	/**
	 * Git repository Committer name
	 *
     * @SWG\Property();
     * @var string
     */
	private $git_committer_name;
	
	/**
	 * Git repository Committer email
	 *
     * @SWG\Property();
     * @var string
     */
	private $git_committer_email;
	
	
	/**
	 * Set Git repository Author name
	 */
	public function setGitAuthorName()
	{
		$this->git_author_name = exec('git log -n1 --pretty=%an 2> /dev/null');
	}
	
	/**
	 * Set Git repository Author email
	 */
	public function setGitAuthorEmail()
	{
		$this->git_author_email = exec('git log -n1 --pretty=%ae 2> /dev/null');
	}
	
	/**
	 * Set Git repository commit date
	 */
	public function setGitCommitDate()
	{
		$git_commit_date = exec('git log -n1 --pretty=%ci 2> /dev/null');
				
		if (!empty($git_commit_date)) {
			$git_commit_date = new \DateTime($git_commit_date);
			$git_commit_date->setTimezone(new \DateTimeZone('UTC'));
			$git_commit_date = $git_commit_date->format('Y-m-d H:m:s');
		}
				
		$this->git_commit_description = $git_commit_date;
	}
	
	/**
	 * Set Git repository commit description
	 */
	public function setGitCommitDescription()
	{
		$this->git_commit_description = trim(exec('git log -n1 --pretty=%s 2> /dev/null'));
	}
	
	/**
	 * Set Git repository commit hash (long format)
	 */
	public function setGitCommitHashFull()
	{
		$this->git_commit_hash_full = exec('git log -n1 --pretty=%H 2> /dev/null');
	}
	
	/**
	 * Set Git repository commit hash (short format)
	 */
	public function setGitCommitHashShort()
	{
		$this->git_commit_hash_short = exec('git log -n1 --pretty=%h 2> /dev/null');
	}
	
	/**
	 * Set Git repository Committer name
	 */
	public function setGitCommitterName()
	{
		$this->git_committer_name = exec('git log -n1 --pretty=%cn 2> /dev/null');
	}
	
	/**
	 * Set Git repository Committer email
	 */
	public function setGitCommitterEmail()
	{
		$this->git_committer_name = exec('git log -n1 --pretty=%ce 2> /dev/null');
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
