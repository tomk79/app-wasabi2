<?php
// autoload.php をロード
$tmp_path_autoload = __DIR__;
while(1){
    if( is_file( $tmp_path_autoload.'/vendor/autoload.php' ) ){
        require_once( $tmp_path_autoload.'/vendor/autoload.php' );
        break;
    }

    if( $tmp_path_autoload == dirname($tmp_path_autoload) ){
        // これ以上、上の階層がない。
        break;
    }
    $tmp_path_autoload = dirname($tmp_path_autoload);
    continue;
}
unset($tmp_path_autoload);

$paprika = new \tomk79\pickles2\paprikaFramework2\paprika(json_decode('{"file_default_permission":"775","dir_default_permission":"775","filesystem_encoding":"UTF-8","session_name":"PXSID","session_expire":1800,"directory_index":["index.html"],"realpath_controot":"./","realpath_controot_preview":"./src/","realpath_homedir":"./px-files/","path_controot":"/","realpath_files":"./login_files/"}'), false);

?>
<?php
if( !isset($paprika) ){
	echo '{$main_contents}'."\n";
	return;
}

$form = $paprika->conf()->exdb->get_form();
$form->auth(
	'user', // テーブル名
	array( // 照合するデータ
		'user_account',
		'password',
	)
);
?>
<?php ob_start(); ?>
<p>ログインしました。</p>
<p><a href="/">戻る</a></p>

<?php
// -----------------------------------
// 出力して終了する
echo $paprika->bind_template(
	array(
		'{$main_contents}'=>ob_get_clean()
	)
);
exit();
