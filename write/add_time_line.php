<?php

require_once("../common/config.php");
require_once("../common/db.class.php");
require_once("../common/functions.php");

$dbClint = db::getIntance();


//添加事件
$sort = intval($_POST['sort']);
$time_line_date = trim($_POST['time_line_date']);
$remark = trim($_POST['remark']);
$enevt_id = intval($_POST['enevt_id']);

if (!empty($enevt_id) && !empty($time_line_date) && !empty($remark)) {
    $data = [
        'event_id' => $enevt_id,
        'sort' => $sort,
        'remark' => htmlspecialchars(nl2br($remark)),
        'created_at' => date('Y-m-d H:i:s'),
        'time_line_date' => $time_line_date,
    ];
    $dbClint->insert('event_time_line', $data);
    jump('detail.html?id='.$enevt_id);
}