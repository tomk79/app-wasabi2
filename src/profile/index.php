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
