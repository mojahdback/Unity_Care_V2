<?php

require_once __DIR__ . '/../classes/utils/Session.php';

Session::logout();

header('Location: /login.php');
exit;


?>