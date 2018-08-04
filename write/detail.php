<?php

require_once("../common/config.php");
require_once("../common/db.class.php");
require_once("../common/functions.php");

$dbClint = db::getIntance();


//添加事件
$id = intval($_POST['id']);
$sql = "select * from event where id=".$id;
$rows = $dbClint->getRow($sql);

$res = [
    'code' => 0,
    'data' => $rows
];
echo json_encode($res);