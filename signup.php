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

$paprika = new \tomk79\pickles2\paprikaFramework2\paprika(json_decode('{"file_default_permission":"775","dir_default_permission":"775","filesystem_encoding":"UTF-8","session_name":"PXSID","session_expire":1800,"directory_index":["index.html"],"realpath_controot":"./","realpath_controot_preview":"./src/","realpath_homedir":"./px-files/","path_controot":"/"}'), false);

?>
<?php ob_start(); ?>
<p>テンプレート中の文字列 <code>{$main_contents}</code> を、HTMLコードに置き換えます。</p>
<p>アプリケーションの動的な処理を実装することもできます。</p>

<?php
$tpl = $paprika->bind_template(
	array(
		'{$main_contents}'=>ob_get_clean()
	),
	'/signup_files/templates/index.html'
);

// -----------------------------------
// 出力して終了する
echo $tpl;
exit();
