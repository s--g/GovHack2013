<?php

set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__).DIRECTORY_SEPARATOR.'includes');

include('Provider/ASIC.php');
include('Facebook/Friend.php');


Provider_ASIC::searchByFacebook(new Facebook_Friend());

die();