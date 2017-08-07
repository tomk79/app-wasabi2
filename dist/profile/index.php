<?php
// chdir
chdir(__DIR__);

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

$paprika = new \tomk79\pickles2\paprikaFramework2\paprika(json_decode('{"file_default_permission":"775","dir_default_permission":"775","filesystem_encoding":"UTF-8","session_name":"PXSID","session_expire":1800,"directory_index":["index.html"],"realpath_controot":"../","realpath_controot_preview":"../../src/","realpath_homedir":"../../px-files/","path_controot":"/","realpath_files":"./index_files/"}'), false);

?>
<?php
if( !isset($paprika) ){
	echo '{$main_contents}'."\n";
	return;
}

ob_start();
if( !$paprika->conf()->exdb->user()->is_login('user') ){
	echo '<p>Please Login.</p>';
}else{
	$options = $paprika->conf()->exdb_form_options;
	$options['table'] = 'user';
	$options['id'] = $paprika->conf()->exdb->user()->get_login_user_info('user');
	$options['id'] = $options['id']['user_account'];
	// var_dump($options);
	// var_dump($paprika->conf()->exdb->user()->get_login_user_info('user'));
	$form = $paprika->conf()->exdb->get_form($options);
	$form->automatic_form();
}
?>
<?php
// -----------------------------------
// 出力して終了する
echo $paprika->bind_template(
	array(
		'{$main_contents}'=>ob_get_clean()
	)
);
exit();
