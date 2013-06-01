<?php

class Provider_ASIC
{
	const ASIC_URL = 'http://www.dtf.wa.gov.au/UnclaimedMonies/queryUM.asp';
	
	public static function searchByFacebook($facebookFriend)
	{
		$fields = array('SearchString' => '%22'.urlencode($facebookFriend->getname()).'%22',
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
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$xml = curl_exec($ch);
		curl_close($ch);

		if(strpos($xml, 'No Records matched the query') !== false)
			return null;
			
		$pos = 1;
		$i = 0;
		$people = array();
		
		while($pos !== false)
		{
			$i++;
			
			$person = new FWB_Person();
			
			$pos = strpos($xml, '<td align="right" valign=top class="RecordTitle">', $pos + 50);
			
			// Name
			preg_match('/(class="RecordTitle"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> )(.*?)(<\/font><\/a>)/s', substr($xml, $pos), $matches);
			$person->setName($matches[2]); //$facebookFriend->getName()); //

			// Amount
			preg_match('/(<font face="Verdana, Arial, Helvetica, sans-serif" size="2">\$)(.*?)(<\/font><\/p><\/td>)/s', substr($xml, $pos), $matches);
			$person->setAmount($matches[2]);
			
			// URL
			preg_match('/(<a href="\/unclmoney\/ownerfiles\/umownerid_)(.*?)(\.asp" class="RecordTitle">)/s', substr($xml, $pos), $matches);
			$person->setUrl('http://www.dtf.wa.gov.au/unclmoney/ownerfiles/umownerid_'.$matches[2].'.asp');
			

			if($i > 10000)
				die(var_dump($pos));
				
			$people[] = $person;
			
		}

		return $people;
	}
}