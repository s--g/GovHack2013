<?php

include 'ASIC.php';
include '../Facebook/Friend.php';

$friend = new Facebook_Friend();
$friend->setFirstName('Paul');
$friend->setSurname('Wong');

$people = Provider_ASIC::searchByFacebook($friend);
