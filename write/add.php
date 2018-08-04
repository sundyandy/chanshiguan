<?php

require_once("../common/config.php");
require_once("../common/db.class.php");
require_once("../common/functions.php");

$dbClint = db::getIntance();


//添加事件
$event_name = trim($_POST['event_name']);
$event_begin_date = trim($_POST['event_begin_date']);
$remark = trim($_POST['remark']);

if (!empty($event_name) && !empty($event_begin_date)) {
    $data = [
        'event_name' => $event_name,
        'event_begin_date' => $event_begin_date,
        'remark' => htmlspecialchars(nl2br($remark)),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'status' => 1,
    ];
    $dbClint->insert('event', $data);
    jump('lists.html');
}