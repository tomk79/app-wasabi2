<?php
/**
 * config_paprika.php template
 */
return call_user_func( function(){

	// initialize

	/** コンフィグオブジェクト */
	$conf_paprika = new stdClass;

	/** database setting */
	$conf_paprika->database = new stdClass;
	$conf_paprika->database->dbms = 'sqlite';
	$conf_paprika->database->host = __DIR__.'/_sys/ram/data/database.sqlite';
	$conf_paprika->database->port = null;
	$conf_paprika->database->dbname = null;
	$conf_paprika->database->username = null;
	$conf_paprika->database->password = null;

	if( !is_dir( __DIR__.'/_sys/ram/caches/' ) ){ mkdir( __DIR__.'/_sys/ram/caches/' ); }
	if( !is_dir( __DIR__.'/_sys/ram/caches/excellent_db/' ) ){ mkdir( __DIR__.'/_sys/ram/caches/excellent_db/' ); }

	// Excellent DB 初期化
	$pdo = new \PDO(
		$conf_paprika->database->dbms.':'.$conf_paprika->database->host,
		null, null,
		array(
			\PDO::ATTR_PERSISTENT => false, // ←これをtrueにすると、"持続的な接続" になる
		)
	);
	$exdb = new excellent_db\create( $pdo, array(
		// テーブル名の接頭辞
		"prefix" => "wasabi2",
		// データベース設計書
		"path_definition_file" => __DIR__.'/excellent_db/tables.xlsx',
		// キャッシュディレクトリ
		"path_cache_dir" => __DIR__.'/_sys/ram/caches/excellent_db/',
	) );
	$conf_paprika->exdb = $exdb;
	$conf_paprika->exdb_form_options = array(
		'templates' => array(
			__DIR__.'/excellent_db/templates/'
		)
	);

	return $conf_paprika;
} );
