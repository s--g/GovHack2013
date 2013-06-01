<?php

class FWB_Person extends Facebook_Friend
{
	protected $amount;
	protected $url;
	
	public function getAmount() { return $this->amount; }
	public function setAmount($value) { $this->amount = $value; }
	public function getUrl() { return $this->url; }
	public function setUrl($value) { $this->url = $value; }
}