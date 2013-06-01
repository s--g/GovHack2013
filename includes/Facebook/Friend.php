<?php

class Facebook_Friend
{
	protected $name;
	
	public function getName() { return $this->name; }
	public function setName($value) { $this->name = $value; }
	
	/**
	 * Lists the logged in user's friends
	 *
	 * @return array An array of Facebook_Friend objects
	 */
	public function listFriends()
	{
	
		//todo
	}

}