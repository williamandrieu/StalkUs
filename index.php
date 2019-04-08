<?php
echo '
<html>
	<head>
	  <title>StalkUS</title> 
	</head>
	<link href="./CSS/message.css" rel="stylesheet">
<body>';


require('./PHP/Message.php');
require('./PHP/BDD.php');

$bdd = new BDD();

$resultUser = $bdd->getUserId(1);
foreach ($resultUser as $val) {
	$resultMessage = $bdd->getMessageExpediteur($val[0]);
	foreach ($resultMessage as $value) {
		$message = new Message($value[3],$value[2],$value[1]);
		echo $message->printMessage($val[2]);
}
}



echo "</body>
</html>";

?>
















