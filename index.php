<?php

set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__).DIRECTORY_SEPARATOR.'includes');

include('Provider/ASIC.php');
include('Facebook/Friend.php');
include('FWB/Person.php');
include('includes/header.php');
include('includes/footer.php');

?>

<form method="post">
Enter a name: <input type="text" name="name" /> <input type="submit" />
</form>
