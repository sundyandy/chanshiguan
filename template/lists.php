<?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>缠史官</title>
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../favicon.ico" />
    <style>
        .title{text-align:center; color:#999999;}
        .news_line{list-style-type:none;}
        .news{font-size:0.7rem; line-height:200%; color:#666666;}
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
            <h3 class="title">有些历史不应该被遗忘。</h3>
            <hr>
            
            <?php
                require_once("../common/config.php");
                require_once("../common/db.class.php");
                require_once("../common/functions.php");
                
                $dbClint = db::getIntance();
                
                $sql = "select * from event order by updated_at desc";
                $rows = $dbClint->getAll($sql);
                $today = date('Y-m-d');
                foreach ($rows as $key=>$line) {
                    $time_line = "select * from event_time_line where event_id=".$line['id']." order by time_line_date desc,sort asc";
                    $time_line_rows = $dbClint->getAll($time_line);
                    $time_line_text = '';
                    $last_time_line_text = '';
                    if ($key == 0) {
                        $last_update = $line['updated_at'];
                    }
                    
                    foreach ($time_line_rows as $time_line_key=>$time_line) {
                        $time_line_text .= '<p class="news">[<strong>'.$time_line['time_line_date'].'</strong>]&nbsp;&nbsp;'.$time_line['remark'].'<hr></p>';
                        if ($time_line_key == 0) {
                            $last_time_line_text = '<p class="news">最新情况：[<strong>'.$time_line['time_line_date'].'</strong>]&nbsp;&nbsp;'.$time_line['remark'].'<hr></p>';
                        }

                        $arr_time_line[] = [
                            'time_line_date' => $time_line['time_line_date'],
                            'remark' => $time_line['remark'],
                        ];
                    }
                    $arr_event[] = [
                        'event_name' => $line['event_name'],
                        'event_begin_date' => $line['event_begin_date'],
                        'remark' => $line['remark'],
                        'created_at' => $line['created_at'],
                        'updated_at' => $line['updated_at'],
                        'time_line' => $arr_time_line,
                    ]; 

                    echo '
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$key.'">
                                        <p>'.$line['event_name'].'<p>
                                        <p>'.$line['event_begin_date'].'&nbsp;&nbsp;,已经过'.diffBetweenTwoDays($line['event_begin_date'], $today).'天</p>
                                        '.$last_time_line_text.'
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse'.$key.'" class="panel-collapse collapse">
                                <div class="panel-body">
                                    '.$time_line_text.'
                                </div>
                            </div>
                        </div>
                    </div>';

                   
                }
            ?>
            <hr>
            <p class="text-right">last updated at: <?php echo $last_update?></p>
            <p><img src="../static/images/cat.jpg" width="100%"></p>
            <p>人们总说鱼的记忆只有7秒，互联网的记忆只有7天。</p>
        </div>
      </div>
    </div>
    
    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="../static/js/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../static/js/bootstrap.min.js"></script>
    

  </body>
</html>
<?php
$content = ob_get_contents();//取得php页面输出的全部内容
$fp = fopen("../html/index.htm", "w");
fwrite($fp, $content);
fclose($fp);

//json
$json = json_encode($arr_event);
$fp = fopen("../html/chanshiguan.json", "w");
fwrite($fp, $json);
fclose($fp);
?>