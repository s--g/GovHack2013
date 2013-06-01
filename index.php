<?php

set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__).DIRECTORY_SEPARATOR.'includes');

include('Provider/ASIC.php');
include('Facebook/Friend.php');
include('FWB/Person.php');

if(isset($_POST['name']))
{
	$friend = new Facebook_Friend();
	$friend->setName($_POST['name']);
	$people = Provider_ASIC::searchByFacebook($friend);

	if($people === null)
		echo('<h1>Sorry! No money for you!</h1>');
	else
	{	
		foreach($people as $person)
			echo('<h1><a href="'.$person->getUrl().'">'.$person->getName().'</a> has $'.$person->getAmount().' to collect!</h1>');
	}
} ?>

<form method="post">
Enter a name: <input type="text" name="name" /> <input type="submit" />
</form>
