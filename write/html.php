<?php

require_once("../common/config.php");
require_once("../common/db.class.php");
require_once("../common/functions.php");

$dbClint = db::getIntance();


$sql = "select * from event order by id desc";
$rows = $dbClint->getAll($sql);

