<?php

class Provider_ASIC
{
	const ASIC_URL = 'http://www.dtf.wa.gov.au/UnclaimedMonies/queryUM.asp';
	
	public static function searchByFacebook($facebookFriend)
	{
		$fields = array('SearchString' => '%22'.urlencode('Steven George').'%22',
						'AmountSearchString' => null,
						'Action' => 'Go');

		$fields_string = '';
						
		foreach($fields as $key => $value) 
			$fields_string .= $key.'='.$value.'&';
			
		rtrim($fields_string, '&');

		$ch = curl_init();

		curl_setopt($ch,CURLOPT_URL, self::ASIC_URL);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

		$result = curl_exec($ch);

		var_dump($results);
		
		curl_close($ch);
	}
}