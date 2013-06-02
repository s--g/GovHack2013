<?php

set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__).DIRECTORY_SEPARATOR.'includes');

require('includes/Facebook/src/facebook.php');
include('Provider/DTF.php');
include('Facebook/Friend.php');
include('FWB/Person.php');

$facebook = new Facebook(array(
  'appId'  => '164335563628833',
  'secret' => '3f8921093284848b1095f3af0e772389',
));

// Get User ID
$user = $facebook->getUser();

if ($user) 
{
  try 
  {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } 
  catch (FacebookApiException $e) 
  {
    error_log($e);
    $user = null;
  }
}

include('includes/header.php');

if (!$user): ?>

<div>
		<p><h3 align="center">Hello Australia. Did you know there's <font color="#EAC117">$677M</font> in unclaimed money across the country? </h3></p>
		<p><h3 align="center">We are here to help you to  find it, claim it and use it.</h3></p>
	</div>
	<div align="center" style="margin-top: 50px;">	
		<img align="center" src="img/T=).png" />
	</div>
	<div align="center"><a href="<?php echo($facebook->getLoginUrl()); ?>"><img align="center" src="img/flogin.png" /></a></div> <?php 
else:

	if(!isset($_GET['action']))
		header('Location: find-money.php');
		
	$user_profile = $facebook->api('/me');
	$userId = $user_profile["id"];

	// Get your list of friends with their details
	$fql = "SELECT uid, first_name, last_name FROM user "
			. "WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = $userId)";
	$friends = $facebook->api(array('method' => 'fql.query', 'query' => $fql)); ?>

	<?php ob_start(); ?>
	<div style="width: 100%; padding-top: 100px;">

		<table style="margin: auto;">
			<tr>
				<td> <?php
					$i = 0;
					$limit = 0;
					foreach ($friends as $value) :
						$limit = $limit + 1;
						if($limit > 30)
							break;
							
						$facebookFriend = new Facebook_Friend();
						$facebookFriend->setFirstName($value['first_name']);
						$facebookFriend->setSurname($value['last_name']);
						$facebookFriend->setImageUrl('https://graph.facebook.com/'.$value['uid'].'/picture');
			
						$people = Provider_DTF::searchByFacebook($facebookFriend);
			
						if(empty($people))
							continue;
						
						$i++;
						
						$high = 0;
						$low = 9999;
						foreach($people as $person)
						{
							if($person->getAmount() < $low)
								$low = $person->getAmount();
							
							if($person->getAmount() > $high)
								$high = $person->getAmount();
						}
						?>
						
						<a href="<?php echo($people[0]->getUrl()); ?>" target="_blank">
							<div class="person">
								<img src="<?php echo($people[0]->getImageUrl()); ?>" />
								<div>
									<?php echo($people[0]->getFirstName()); ?><br />
									
									<?php if($high == 0 || $low == 9999): ?>
									<span style="font-size: 12px;">$<?php echo($people[0]->getAmount()); ?></span>
									<?php else: ?>
									<span style="font-size: 12px;"><?php echo('$'.$low.' - $'.$high); ?></span>
									<?php endif; ?>
								</div>
							</div>
						</a>
					<?php endforeach; ?>
				</td>
			</tr>
		</table>
		
	</div> <?php
	
	$out1 = ob_get_contents();
	ob_end_clean();
		
	if($i == 0): ?>
		<div class="span8 offset2" style="margin-top: 50px; margin-bottom: 20px; text-align: center;">
			<h1>Oh no!</h1>
			<p>&nbsp;</p>
			<p style="font-size: 28pt;">You have no friends with benefits.</p>
			<p style="font-size: 170pt; line-height: 200px; font-weight: bold; color: #ff0;" id="number-of-friends">:(</p>
		</div>	<?php 
		
		echo($out1);
	 else: ?>
		<div class="span8 offset2" style="margin-top: 50px; margin-bottom: 20px; text-align: center;">
			<img src="img/congrats.png" style="height: 90px;" />
			<p>&nbsp;</p>
			<p style="font-size: 28pt;"><?php echo $user_profile["name"]; ?>.  You have:</p>
			<p style="font-size: 170pt; line-height: 200px; font-weight: bold; color: #ff0;" id="number-of-friends"><?php echo($i); ?></p>
			<p style="font-size: 28pt;">friends with benefits!</p>
		</div> <?php	
		
		echo($out1); 
	endif;

endif;
include('includes/footer.php');