<?php

require_once("../common/config.php");
require_once("../common/db.class.php");
require_once("../common/functions.php");

$dbClint = db::getIntance();


//添加事件
$sql = "select * from event order by id desc";
$rows = $dbClint->getAll($sql);
$res = [
    'code' => 0,
    'data' => $rows
];
echo json_encode($res);