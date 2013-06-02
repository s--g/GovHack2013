<?php

class Facebook_Friend
{
	protected $firstName;
	protected $imageUrl;
	protected $surname;
	
	public function getFirstName() { return $this->firstName; }
	public function setFirstName($value) { $this->firstName = $value; }
	public function getSurname() { return $this->surname; }
	public function setSurname($value) { $this->surname = $value; }
	public function getImageUrl() { return $this->imageUrl; }
	public function setImageUrl($value) { $this->imageUrl = $value; }
	
	
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