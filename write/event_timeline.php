<?php

require_once("../common/config.php");
require_once("../common/db.class.php");
require_once("../common/functions.php");

$dbClint = db::getIntance();


//添加事件
$id = intval($_POST['event_id']);
$sql = "select * from event_time_line where event_id=".$id ." order by time_line_date asc,sort asc";
$rows = $dbClint->getAll($sql);

$res = [
    'code' => 0,
    'data' => $rows
];
echo json_encode($res);