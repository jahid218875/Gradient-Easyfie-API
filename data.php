<?php

require 'config.php';

$orders = $easyfie->Orders($token, $_POST);



$notify = $easyfie->notify($token);
echo json_encode($orders);
exit;

?>