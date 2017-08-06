<?php
@header('Content-type: text/json');

// データベーステーブルを初期化
$result = $conf_paprika->exdb->migrate_init_tables();

echo json_encode(array(
    'result'=>$result,
));
exit();
