<?php

class Provider_ASIC
{
	const ASIC_URL = 'https://www.moneysmart.gov.au/ws/MoneySmart.svc/UnclaimedMoneySearch';
	
	public static function searchByFacebook($facebookFriend)
	{
		$ch = curl_init();

		curl_setopt($ch,CURLOPT_URL, self::ASIC_URL);
		curl_setopt($ch,CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS, '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><SOAP-ENV:Body><m:simpleQueryRequest xmlns:m="uri:ebusiness.asic.gov.au"><m:accountName><![CDATA['.urlencode($facebookFriend->getFirstName().' '.$facebookFriend->getSurname()).']]></m:accountName></m:simpleQueryRequest></SOAP-ENV:Body></SOAP-ENV:Envelope>');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml'));

		$xml = curl_exec($ch);
		curl_close($ch);

	var_dump($xml); 
	die();
		
		if(strpos($xml, '0 results found') !== false)
			return null;
			
		$people = new SimpleXMLElement($xml);
		
		$people = array();
		
		// todo: Loop
		{
			$person = new FWB_Person();
			$person->setFirstName($facebookFriend->getFirstName());
			$person->setImageUrl($facebookFriend->getImageUrl());
			$person->setAmount();
			$person->setUrl();
			$people[] = $person;
			
		}

		return $people;
	}
}